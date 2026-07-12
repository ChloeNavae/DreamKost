<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class KomplainController extends Controller
{
    // Penghuni mengirim komplain baru
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        Komplain::create([
            'owner_id' => Auth::id(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => 'pending',
        ]);

        return back()->withSuccess('Komplain berhasil dikirim ke pemilik kos!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.dbkomplain', [
            'komplain' => Komplain::with('penghuni')->latest()->get(),
        ]);
    }

    /**
     * Pemilik kos update status komplain (pending -> diproses -> selesai).
     */
    public function updateStatus(Request $request, Komplain $komplain): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai',
        ]);

        $komplain->status = $request->status;
        $komplain->save();

        return back()->withSuccess('Status komplain berhasil diperbarui!');
    }

    // Count Komplain Pending
    public function pendingCount(): JsonResponse
    {
        return response()->json([
            'pending' => Komplain::where('status', 'pending')->count(),
        ]);
    }
}
