<?php

use App\Http\Controllers\ProfileController;
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

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
