<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout.master');
});

Route::resource('/berita', \App\Http\Controllers\Backsite\BeritaDesaController::class);
Route::resource('/datapenduduk', \App\Http\Controllers\Backsite\DataPendudukController::class);
Route::resource('/galeri', \App\Http\Controllers\Backsite\GaleriDesaController::class);
Route::resource('/kegiatan', \App\Http\Controllers\Backsite\KegiatanDesaController::class);
Route::resource('/kepaladesa', \App\Http\Controllers\Backsite\ProfilKepalaDesaController::class);
Route::resource('/perangkatdesa', \App\Http\Controllers\Backsite\ProfilPerangkatDesaController::class);
Route::resource('/peta', \App\Http\Controllers\Backsite\PetaDesaController::class);
Route::resource('/profil', \App\Http\Controllers\Backsite\ProfilDesaController::class);
Route::resource('/sejarah', \App\Http\Controllers\Backsite\SejarahDesaController::class);
Route::resource('/struktur', \App\Http\Controllers\Backsite\StrukturOrganisasiController::class);
Route::resource('/visimisi', \App\Http\Controllers\Backsite\VisiMisiController::class);