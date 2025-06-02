<?php

use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\Detail_tindakanController;

use Illuminate\Support\Facades\Route;

//route kunjungan
Route::apiResource('kunjungans', KunjunganController::class);

//route pasien
Route::apiResource('pasiens', PasienController::class);

//route dokter
Route::apiResource('dokters', DokterController::class);

//route tindakan
Route::apiResource('tindakans', TindakanController::class);

//route detail tindakan
Route::apiResource('detail_tindakans', Detail_tindakanController::class);

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
