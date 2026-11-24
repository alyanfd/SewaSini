
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KosController;

// ===============================
// HALAMAN PUBLIK
// ===============================

Route::get('/', function () {
    return view('home');
})->name('home.public');

Route::get('/daftar-akun', function () {
    return view('daftar-akun');
});

Route::post('/daftar-akun', [AuthController::class, 'register'])
    ->name('register');

Route::get('/login', function () {
    return view('login');
});

Route::get('/home-pemilik', function () {
    return view('home-pemilik');
})->name('home.pemilik');


// ===============================
// HALAMAN KHUSUS PEMILIK KOS
// ===============================

Route::middleware('auth')->group(function () {

    // Edit Profil
    Route::get('/edit-profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/edit-profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    // Kos Saya
    Route::get('/kos-saya', [KosController::class, 'index'])
        ->name('kos.index');

    // Proses Pendaftaran Kos
    Route::post('/kos-saya', [KosController::class, 'store'])
        ->name('kos.store');

});


// ===============================
// LOGOUT
// ===============================

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
