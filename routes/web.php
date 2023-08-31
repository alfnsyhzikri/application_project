<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\SoalController;
use App\Http\Controllers\Siswa\DaftarUlangController;
use App\Http\Controllers\Siswa\TesMinatBakatController;

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
    return view('layouts.master');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');





// ROUTE ADMIN
Route::middleware(['auth', 'level:Administrator'])->group(function () {

    // Index Admin
    Route::get('/admin', function () {
        return view('users.admin.index');
    });

    // Menampilkan dan Verifikasi Data User 
    Route::put('/data_user/{id}', [AuthenticatedSessionController::class, 'update'])->name('admin.update');
    Route::get('/data_user', [AuthenticatedSessionController::class, 'index']);

    // Upload Soal
    Route::get('/soal', [SoalController::class, 'index']);
    Route::post('/soal/upload', [SoalController::class, 'upload'])->name('soal.upload');
});








// ROUTE SISWA
Route::middleware(['auth','level:siswa'])->group(function(){
    
    // Index Siswa
    Route::get('/user', function () {
        return view('users.siswa.index');
    })->middleware('auth');

    // Pengumuman
    Route::get('/pengumuman', function () {
        return view('users.siswa.pengumuman');
    })->middleware('auth');

    // Daftar Ulang
    Route::get('/daftar_ulang', [DaftarUlangController::class, 'index']);
    Route::get('/submit/daftar_ulang', [DaftarUlangController::class, 'DaftarUlang'])->name('submit.daftar_ulang');

    // Tes Minat Bakat
    Route::get('/minat_bakat', [TesMinatBakatController::class, 'index'])->name('index.tes');
    Route::get('/tes_minat_bakat', [TesMinatBakatController::class, 'TesMinatBakat']);
    Route::post('/tes/submit', [TesMinatBakatController::class, 'submitTes'])->name('tes.submit');

});








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
