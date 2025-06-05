<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


     // Route untuk menampilkan daftar komik
    Route::get('/comics', [ComicController::class, 'index'])->name('comics.index'); // <-- TAMBAHKAN INI

    Route::get('/comics/create', [ComicController::class, 'create'])->name('comics.create');

    // Kamu juga akan memerlukan route untuk store, show, edit, update, destroy nanti
    Route::post('/comics', [ComicController::class, 'store'])->name('comics.store');
    Route::get('/comics/{comic}', [ComicController::class, 'show'])->name('comics.show'); // {comic} adalah parameter
    Route::get('/comics/{comic}/edit', [ComicController::class, 'edit'])->name('comics.edit');
    Route::put('/comics/{comic}', [ComicController::class, 'update'])->name('comics.update');    // atau Route::patch
    Route::delete('/comics/{comic}', [ComicController::class, 'destroy'])->name('comics.destroy');
});

require __DIR__.'/auth.php';
