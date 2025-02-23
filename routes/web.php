<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Models\Kamar;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['nama' => 'Leonardo Imanuel']);
});

Route::get('/foto', function () {
    return view('foto');
});

Route::get('/sewa', function () {
    return view('./sewa', ['kamars' => Kamar::all()]);
})->middleware('auth');;

Route::get('/sewa/{kamar}/pembayaran', function (Kamar $kamar) {
    return view('transaksi', ['kamar' => $kamar]);
})->middleware('auth');;

Route::post('post-pembayaran', [TransactionController::class, 'storeTransaction'])->name('transcation.post'); 

Route::get('/sewa/{kamar}', function (Kamar $kamar) {
    return view('kamar', ['kamar' => $kamar]);
})->middleware('auth');;

Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
})->middleware('auth');

Route::get('/dbuser', function () {
    return view('dashboard/dbuser', ['users' => User::all()]);
})->middleware('auth');

Route::get('/dbkamar', function () {
    return view('dashboard/dbkamar', ['kamar' => Kamar::all()]);
})->middleware('auth');

Route::get('/editkamar', function(Kamar $kamar) {  // MASIH ERROR
    return view('dashboard/editkamar', ['users' => User::all(), 'kamar' => Kamar::all()]);
})->middleware('auth');

Route::put('post-update', [DashboardController::class, 'updateKamar'])->name('kamar.update');

Route::get('/dbtransaksi', function () {
    return view('dashboard/dbtransaksi', ['transaksi' => Transaksi::all()]);
})->middleware('auth');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'register'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegister'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
