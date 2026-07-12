<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\User;
use App\Models\Pengumuman;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TenantDashboardController extends Controller
{
    public function index(): View|RedirectResponse
    {
        $userId = Auth::id();

        // Cek apakah user punya kamar (menghindari bypass via url)
        $punyaKamar = Kamar::where('owner_id', $userId)->exists();
        if (!$punyaKamar) {
            return redirect('/sewa')->withError('Kamu belum memiliki kamar. Silakan sewa terlebih dahulu.');
        }

        // Cari kamar yang sedang disewa user ini
        $kamar = Kamar::where('owner_id', $userId)->first();

        $daysUntilDue = null;
        $showDueReminder = false;

        if ($kamar && $kamar->ended_at) {
            $endedAt = Carbon::parse($kamar->ended_at);
            $daysUntilDue = now()->startOfDay()->diffInDays($endedAt->startOfDay(), false);

            // reminder tampil kalau <= 5 hari lagi (dan belum lewat jatuh tempo)
            $showDueReminder = $daysUntilDue <= 5 && $daysUntilDue >= 0;
        }

        // Pengumuman terbaru dari pemilik kos (semua penghuni lihat pengumuman yang sama)
        $pengumuman = Pengumuman::latest()->take(10)->get();

        // Riwayat transaksi milik user ini (kolom owner_id di tabel transaksis
        // menyimpan id user penyewa, sesuai migration asli)
        $riwayatTransaksi = Transaksi::where('owner_id', $userId)
            ->latest()
            ->get();

        return view('dashboard.tendashboard', [
            'kamar' => $kamar,
            'daysUntilDue' => $daysUntilDue,
            'showDueReminder' => $showDueReminder,
            'pengumuman' => $pengumuman,
            'riwayatTransaksi' => $riwayatTransaksi,
        ]);
    }

    /**
     * Penghuni mengajukan perpanjangan sewa.
     * Versi sederhana: langsung memperpanjang ended_at sesuai jumlah bulan yang dipilih.
     * (Kalau butuh alur approval dari pemilik kos dulu, ini perlu diubah jadi
     * membuat request/transaksi berstatus 'pending' alih-alih update langsung.)
     */
    public function extendSewa(Request $request): RedirectResponse
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
 
        $kamar = Kamar::where('owner_id', Auth::id())->firstOrFail();
 
        // Cegah pengajuan dobel selama masih ada yang pending
        $adaPending = Transaksi::where('owner_id', Auth::id())
            ->where('status', 'pending')
            ->exists();
        if ($adaPending) {
            return back()->withError('Kamu masih punya pengajuan yang sedang diproses. Tunggu sampai disetujui/ditolak dulu.');
        }
 
        // ubah nama img menjadi name_date_time
        $userName = User::where('id', Auth::id())->value('name');
        $dateTime = now()->format('d-m-Y_H-i-s');;
        $imageName = $userName.'_'.$dateTime.'.'.$request->image->extension();
        $request->image->move(public_path('bukti'), $imageName);
 
        Transaksi::create([
            'owner_id' => Auth::id(),
            'image' => 'bukti/'.$imageName,
            'no_kamar' => $kamar->no_kamar,
            'durasi' => $request->bulan,
            'jenis' => 'perpanjangan',
            'status' => 'pending',
        ]);
 
        return back()->withSuccess('Pengajuan perpanjangan sewa dikirim, silahkan tunggu persetujuan pemilik kos.');
    }
}
