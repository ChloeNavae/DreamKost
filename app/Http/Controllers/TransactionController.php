<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function storeTransaction(Request $request, Transaksi $transaksi)
    {
        // 1. Kalau user sudah punya kamar
        if (Kamar::where('owner_id', Auth::id())->exists()) {
            return back()->withError('Kamu sudah memiliki kamar. Tidak bisa menyewa kamar lain.');
        }

        // 2. Kalau user masih punya transaksi pending yang belum di-accept/decline
        if (Transaksi::where('owner_id', Auth::id())->where('status', 'pending')->exists()) {
            return back()->withError('Kamu masih punya transaksi yang sedang diproses. Tunggu sampai disetujui/ditolak dulu.');
        }

        $request->validate([
            'duration' => 'required|numeric|min:1|max:12',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'no_kamar' => 'required|numeric',
        ]);

        // ubah nama img menjadi name_date_time
        $userName = User::where('id', Auth::id())->value('name');
        $dateTime = now()->format('d-m-Y_H-i-s');;
        $imageName = $userName.'_'.$dateTime.'.'.$request->image->extension();
        $request->image->move(public_path('bukti'), $imageName);
        // $transaksi = new Transaksi();
        $transaksi->owner_id = Auth::id();
        $transaksi->image = 'bukti/'.$imageName;
        $transaksi->no_kamar = $request->no_kamar;
        $transaksi->durasi = $request->duration;

        $transaksi->save();
        return redirect("/")->withSuccess('Sewa Dalam Proses, Silahkan Tunggu.');
    }

    // Transaksi di Setujui
    public function accepted(Transaksi $transaksi): RedirectResponse
    {
        $kamar = Kamar::find($transaksi->no_kamar);

        if (! $kamar) {
            return back()->withError('Kamar untuk transaksi ini tidak ditemukan.');
        }

        if ($transaksi->jenis === 'perpanjangan') {
            // Perpanjangan: kamar seharusnya sudah dihuni user ini, tinggal tambah ended_at
            $baseDate = $kamar->ended_at ? Carbon::parse($kamar->ended_at) : now()->format('Y-m-d');
            $kamar->ended_at = $baseDate->addMonths((int) $transaksi->durasi)->format('Y-m-d');
            $kamar->save();

            $transaksi->status = 'accepted';
            $transaksi->save();

            return back()->withSuccess('Perpanjangan sewa disetujui, masa sewa kamar berhasil diperpanjang!');
        }

        // Mencegah kamar yang sudah di tempati di isi ulang oleh penghuni lain
        if ($kamar->terisi && $kamar->owner_id !== $transaksi->owner_id) {
            return back()->withError('Kamar ini sudah terisi oleh penghuni lain. Tolak transaksi ini atau pindahkan penghuni sebelumnya terlebih dahulu.');
        }

        $transaksi->status = 'accepted';
        $transaksi->save();

        $kamar->owner_id = $transaksi->owner_id;
        $kamar->started_at = now()->format('Y-m-d');
        $kamar->ended_at = now()->addMonths((int) $transaksi->durasi)->format('Y-m-d');
        $kamar->terisi = true;
        $kamar->save();

        return back()->withSuccess('Transaksi disetujui, user berhasil di-assign ke kamar!');
    }

    // Transaksi di Tolak
    public function declined(Transaksi $transaksi): RedirectResponse
    {
        $transaksi->status = 'declined';
        $transaksi->save();

        return back()->withSuccess('Transaksi berhasil ditolak!');
    }

    // Count Transaksi Pending
    public function pendingCount(): JsonResponse
    {
        return response()->json([
            'pending' => Transaksi::where('status', 'pending')->count(),
        ]);
    }
}
