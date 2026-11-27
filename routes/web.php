
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

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


Route::get('/daftar-kos', function () {
    return view('daftar-kos');
});


Route::get('/detail-kos/{nama}', function ($nama) {

    $daftarKos = [
        'kos-harvia' => [
            'nama' => 'Kos Harvia',
            'lokasi' => 'Rumbai, Pekanbaru',
            'harga' => 850000,
            'jenis' => 'Putri',
            'gambar' => 'kos-1.jpg',
            'rating' => 4.9,
            'jumlah_ulasan' => 28,
            'kamar_tersedia' => true,
            'jumlah_kamar' => 3,
            'fasilitas' => ['WiFi', 'AC', 'Parkir'],
            'kamar_mandi' => 'Dalam',
            'periode' => 'Bulanan',
            'deskripsi' => 'Kos Harvia merupakan tempat tinggal yang nyaman dan strategis di kawasan Rumbai, cocok untuk mahasiswa maupun pekerja.',
            'alamat' => 'Rumbai, Pekanbaru, Riau',
            'aturan' => [
                'Khusus perempuan',
                'Menjaga kebersihan kamar',
                'Tidak diperbolehkan membawa hewan peliharaan',
                'Tamu wajib melapor kepada pemilik kos'
            ],
            'ulasan' => [
                [
                    'nama' => 'Nadia',
                    'rating' => 5,
                    'tanggal' => '12 Oktober 2026',
                    'komentar' => 'Kosnya nyaman, bersih, dan pemiliknya ramah.'
                ],
                [
                    'nama' => 'Putri',
                    'rating' => 5,
                    'tanggal' => '5 September 2026',
                    'komentar' => 'Fasilitasnya sesuai dengan informasi. Lokasinya juga cukup strategis.'
                ],
                [
                    'nama' => 'Salsa',
                    'rating' => 4,
                    'tanggal' => '20 Agustus 2026',
                    'komentar' => 'Lingkungannya nyaman dan cocok untuk mahasiswa.'
                ]
            ]
        ],
    ];

    if (!array_key_exists($nama, $daftarKos)) {
        abort(404);
    }

    $kos = $daftarKos[$nama];

    return view('detail-kos', compact('kos'));

});
