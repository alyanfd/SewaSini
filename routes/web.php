<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/daftar-akun', function () {
    return view('daftar-akun');
});
Route::get('/login', function () {
    return view('login');
});