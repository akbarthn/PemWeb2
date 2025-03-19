<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/home', function () {
    return view('Ini adalah Halaman Home');
});

Route::get('/search', function () {
    return view('Ini adalah Halaman Search');
});

Route::get('/product', function () {
    return view('Ini adalah Halaman Produk');
});

Route::get('/category', function () {
    return view('Ini adalah Halaman Kategori');
});

Route::get('/cart', function () {
    return view('Ini adalah Halaman Keranjang');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
