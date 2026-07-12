<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function dashboard(): View|RedirectResponse 
    {
        // Penghuni (is_admin = false) diarahkan ke dashboard khusus penghuni.
        // Pemilik kos (is_admin = true) tetap lihat dashboard admin ini.
        if (! Auth::user()->is_admin) {
            
            // Cek apakah user (penghuni) sudah memiliki kamar
            $punyaKamar = Kamar::where('owner_id', Auth::id())->exists();

            // Jika belum punya kamar, arahkan ke halaman /sewa
            if (!$punyaKamar) {
                return redirect('/sewa')->withError('Kamu belum memiliki kamar. Silakan sewa terlebih dahulu.'); 
                // Catatan: withError() bisa diganti/dihapus sesuai setup session flash message Anda
            }

            // Jika sudah punya kamar, arahkan ke dashboard tenant
            return redirect()->route('dashboard.tenant');
        }

        // if (! Auth::user()->is_admin) {
        //     return redirect()->route('dashboard.tenant');
        // }

        return view('dashboard.dashboard', [
            'totalUsers' => User::count(),
            'totalKamar' => Kamar::count(),
            'totalTransaksi' => Transaksi::count(),
        ]);
    }

    // untuk update jumlah data secara berkala di dashboard.blade.php
    public function dashboardStats(): JsonResponse
    {
        return response()->json([
            'totalUsers' => User::count(),
            'totalKamar' => Kamar::count(),
            'totalTransaksi' => Transaksi::count(),
        ]);
    }

    public function dbuser(): View
    {
        return view('dashboard.dbuser');
    }

    public function dbkamar(): View
    {
        
        return view('dashboard.dbkamar');
    }

    public function dbtransaksi(): View
    {
        return view('dashboard.dbtransaksi');
    }

    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')->withSuccess('Kamu Berhasil Masuk!');
        }
        return redirect("login")->withError('Email atau Password salah!');
    }

    public function postRegister(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|min:11',
            'password' => 'required|min:5',
        ]);

        $data = $request->all();
        $user = $this->create($data);

        Auth::login($user);

        return redirect("/")->withSuccess('Kamu Berhasil Masuk!');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
