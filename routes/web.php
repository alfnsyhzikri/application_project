<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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





// ROUTE SISWA
Route::middleware(['auth','level:siswa'])->group(function(){
    Route::get('/user', function () {
        return view('users.siswa.index');
    })->middleware('auth');

    Route::get('/pengumuman', function () {
        return view('users.siswa.pengumuman');
    })->middleware('auth');

});







// ROUTE ADMIN
Route::middleware(['auth', 'level:Administrator'])->group(function () {
    Route::get('/admin', function () {
        return view('users.admin.index');
    });

    Route::put('/data_user/{id}', [AuthenticatedSessionController::class, 'update'])->name('admin.update');
    Route::get('/data_user', [AuthenticatedSessionController::class, 'index']);
});









Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
