<?php

use App\Http\Controllers\DetailTindakanController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\TindakanController;
use App\Models\Dokter;
use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Tindakan;
use App\Models\DetailTindakan;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/tambah', function () {
    return view('tambah');
});

Route::resource('dokter', DokterController::class);

Route::get('/dokter', function () {
    $dokters = Dokter::all(); // Ambil semua data dari tabel dokters
    return view('dokter', compact('dokters'));
});

Route::resource('pasien', PasienController::class);

Route::get('/pasien', function () {
    $pasiens = Pasien::all(); // Ambil semua data dari tabel dokters
    return view('pasien', compact('pasiens'));
});

Route::resource('tindakan', TindakanController::class);

Route::get('/tindakan', function () {
    $tindakans = Tindakan::all(); // Ambil semua data dari tabel dokters
    return view('tindakan', compact('tindakans'));
});

Route::get('/tindakan', [TindakanController::class, 'index'])->name('tindakan.index');

Route::get('/kunjungan', function () {
    $kunjungans = Kunjungan::all(); // Ambil semua data dari tabel dokters
    return view('kunjungan', compact('kunjungans'));
});

Route::get('/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan.index');
Route::post('/kunjungan', [KunjunganController::class, 'store']);

Route::resource('Detail_Tindakan', DetailTindakanController::class);

Route::get('/DetailTindakan', function () {//insyallah sudah benar
    $Detail_Tindakan = DetailTindakan::all(); // Ambil semua data dari tabel DetailTindakan
    return view('DetailTindakan', compact('DetailTindakan'));
});

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dokter', function () {
    return view('dokter');
})->middleware(['auth', 'verified'])->name('dokter');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
