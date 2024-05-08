<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\InformasiController ;
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
    return view('welcome');
});

Route::get('/dashboard',  [MainController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //Informasi
    Route::get('/informasi-sekolah', [InformasiController::class, 'index'])->name('informasi.index');
    Route::get('/informasi-sekolah-add', [InformasiController::class, 'create'])->name('informasi.create');
    Route::post('/informasi-sekolah-store', [InformasiController::class, 'store'])->name('informasi.store');
    Route::delete('/informasi-sekolah', [InformasiController::class, 'delete'])->name('informasi.delete');
    Route::get('/informasi-sekolah-prev/{id}', [InformasiController::class, 'show'])->name('informasi.show');
    Route::get('/informasi-sekolah-edit/{id}', [InformasiController::class, 'edit'])->name('informasi.edit');
    Route::patch('/informasi-sekolah-update/{id}', [InformasiController::class, 'update'])->name('informasi.update');
    //Profil
    Route::get('/profil-sekolah', [ProfilController::class, 'index'])->name('profil.index');
    Route::get('/profil-sekolah-add', [ProfilController::class, 'create'])->name('profil.create');
    Route::post('/profil-sekolah-store', [ProfilController::class, 'store'])->name('profil.store');
    Route::delete('/profil-sekolah', [ProfilController::class, 'delete'])->name('profil.delete');
    Route::get('/profil-sekolah-prev/{id}', [ProfilController::class, 'show'])->name('profil.show');
    Route::get('/profil-sekolah-edit/{id}', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::patch('/profil-sekolah-update/{id}', [ProfilController::class, 'update'])->name('profil.update');
    //Prestasi
    Route::get('/prestasi-sekolah', [PrestasiController::class, 'index'])->name('prestasi.index');
    Route::get('/prestasi-sekolah-add', [PrestasiController::class, 'create'])->name('prestasi.create');
    Route::post('/prestasi-sekolah-store', [PrestasiController::class, 'store'])->name('prestasi.store');
    Route::delete('/prestasi-sekolah', [PrestasiController::class, 'delete'])->name('prestasi.delete');
    Route::get('/prestasi-sekolah-prev/{id}', [PrestasiController::class, 'show'])->name('prestasi.show');
    Route::get('/prestasi-sekolah-edit/{id}', [PrestasiController::class, 'edit'])->name('prestasi.edit');
    Route::patch('/prestasi-sekolah-update/{id}', [PrestasiController::class, 'update'])->name('prestasi.update');
    //Guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru-add', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/guru-store', [GuruController::class, 'store'])->name('guru.store');
    Route::delete('/guru', [GuruController::class, 'delete'])->name('guru.delete');
    Route::get('/guru-prev/{id}', [GuruController::class, 'show'])->name('guru.show');
    Route::get('/guru-edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
    Route::patch('/guru-update/{id}', [GuruController::class, 'update'])->name('guru.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
