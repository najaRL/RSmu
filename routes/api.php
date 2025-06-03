<?php

use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\DetailTindakanController;

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
Route::apiResource('Detail_Tindakans', DetailTindakanController::class);




