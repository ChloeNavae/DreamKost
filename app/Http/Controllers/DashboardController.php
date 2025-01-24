<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function update(): View
    {
        return view('dashboard.editkamar', ['kamar' => Kamar::all(), 'users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editKamar(Kamar $kamar)
    {
        return view('dashboard.dbkamar');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateKamar(Request $request, Kamar $kamar): RedirectResponse
    {
        $request->validate([
            'no_kamar' => 'required|numeric',
            'lantai' => 'required|numeric|min:1',
        ]);

        $kamar->owner_id = $request->owner_id;
        $kamar->lantai = $request->lantai;
        $kamar->started_at = $request->started_at;
        $kamar->ended_at = $request->ended_at;
        if ($request->owner_id != null) {
            $kamar->terisi = true;
        } else {
            $kamar->terisi = false;
        };

        $kamar->update();
          
        return redirect()->route('dashboard.dbkamar')->withSuccess('Kamar terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kamar $kamar)
    {
        //
    }
}
