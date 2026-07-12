<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PengumumanController extends Controller
{
    /**
     * Halaman daftar pengumuman + form buat baru (sisi pemilik kos).
     */
    public function index(): View
    {
        return view('dashboard.dbpengumuman', [
            'pengumuman' => Pengumuman::with('pemilik')->latest()->get(),
        ]);
    }

    /**
     * Simpan pengumuman baru — otomatis tampil di dashboard semua penghuni.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        Pengumuman::create([
            'owner_id' => Auth::id(),
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return back()->withSuccess('Pengumuman berhasil dipublikasikan!');
    }

    /**
     * Hapus pengumuman.
     */
    public function destroy(Pengumuman $pengumuman): RedirectResponse
    {
        $pengumuman->delete();

        return back()->withSuccess('Pengumuman berhasil dihapus!');
    }
}
