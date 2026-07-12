<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function storeTransaction(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'duration' => 'required|numeric|min:1|max:12',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'no_kamar' => 'required|numeric',
        ]);
        $imageName = time().'.'.$request->image->extension();
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

        // Mencegah kamar yang sudah di tempati di isi ulang oleh penghuni lain
        if ($kamar->terisi && $kamar->owner_id !== $transaksi->owner_id) {
            return back()->withError('Kamar ini sudah terisi oleh penghuni lain. Tolak transaksi ini atau pindahkan penghuni sebelumnya terlebih dahulu.');
        }

        $transaksi->status = 'accepted';
        $transaksi->save();

        $kamar->owner_id = $transaksi->owner_id;
        $kamar->started_at = now();
        $kamar->ended_at = now()->addMonths((int) $transaksi->durasi);
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
