<?php

use App\Models\Kamar;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['nama' => 'Leonardo Imanuel']);
});

Route::get('/foto', function () {
    return view('foto');
});

Route::get('/sewa', function () {
    return view('sewa', ['kamars' => Kamar::all()]);
});

Route::get('/sewa/{kamar}', function (Kamar $kamar) {
    return view('kamar', ['kamar' => $kamar]);
});

Route::get('/login', function() {
    return view('auth/login');
});

Route::get('/register', function() {
    return view('auth/register');
});

Route::get('/dashboard', function() {
    return view('dashboard/dashboard');
});