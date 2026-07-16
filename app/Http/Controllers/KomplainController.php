<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use App\Services\PushNotificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class KomplainController extends Controller
{
    // Penghuni mengirim komplain baru
    public function store(Request $request, PushNotificationService $pushService): RedirectResponse
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

        // PushNotification for Admin
        $pushService->sendToAdmins(
            title: 'Komplain Baru Masuk',
            body: Auth::user()->name.': '.$request->judul,
            url: route('dbkomplain')
        );

        return back()->withSuccess('Komplain berhasil dikirim ke pemilik kos!');
    }

    // Menampilkan Komplain Penghuni
    public function index(): View
    {
        return view('dashboard.dbkomplain', [
            'komplain' => Komplain::with('penghuni')->latest()->get(),
        ]);
    }

    // Pemilik kos update status komplain
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

    // Delete Komplain
    public function destroySelected(Request $request): RedirectResponse
    {
        $request->validate([
            'komplain_ids' => 'required|array|min:1',
            'komplain_ids.*' => 'exists:komplains,id',
        ], [
            'komplain_ids.required' => 'Pilih minimal 1 komplain untuk dihapus.',
        ]);
 
        Komplain::whereIn('id', $request->komplain_ids)->delete();
 
        return back()->withSuccess('Komplain terpilih berhasil dihapus!');
    }
}
