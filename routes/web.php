<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SubMateriController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cek', [AuthController::class, 'landingPage'])->name('landingPage');

Route::get('/login', [AuthController::class,'login',])->name('login');
Route::post('/login-proses', [AuthController::class, 'loginProses'])->name('login.proses');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register-proses', [AuthController::class, 'registerProses'])->name('register.proses');

// logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// midleware group auth
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('cms.dashboard');

    // materi
    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');
    Route::post('/materi/store', [MateriController::class, 'store'])->name('materi.store');
    Route::get('/materi/{id}', [MateriController::class, 'show'])->name('materi.show');
    Route::get('/materi/{id}/edit', [MateriController::class, 'edit'])->name('materi.edit');
    Route::post('/materi/{id}/update', [MateriController::class, 'update'])->name('materi.update');
    Route::post('/materi/{id}/destroy', [MateriController::class, 'destroy'])->name('materi.destroy');

    // sub-materi.index tambah id materi
    Route::get('/sub-materi/{materi_id}', [SubMateriController::class, 'index'])->name('sub-materi.index');
    Route::get('/sub-materi/create/{materi_id}', [SubMateriController::class, 'create'])->name('sub-materi.create');
    Route::post('/sub-materi/store/{materi_id}', [SubMateriController::class, 'store'])->name('sub-materi.store');
    Route::get('/sub-materi/show/{id}', [SubMateriController::class, 'show'])->name('sub-materi.show');
    Route::get('/sub-materi/{id}/edit', [SubMateriController::class, 'edit'])->name('sub-materi.edit');
    Route::post('/sub-materi/{id}/update', [SubMateriController::class, 'update'])->name('sub-materi.update');
    Route::post('/sub-materi/{id}/destroy', [SubMateriController::class, 'destroy'])->name('sub-materi.destroy');


});