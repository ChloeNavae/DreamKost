<?php

use App\Http\Controllers\AuthController;
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
})->middleware('auth');;

Route::get('/sewa/{kamar}', function (Kamar $kamar) {
    return view('kamar', ['kamar' => $kamar]);
})->middleware('auth');;

Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
})->middleware('auth');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'register'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegister'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
