<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\OrderController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('layouts.silab');
    });
    Route::get('login', [LoginController::class, 'index']);
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::middleware('role:user')->group(function () {
        Route::get('lab', [LabController::class, 'index'])->name('index');
        Route::get('produk/kategori/{category}', [LabController::class, 'kategori'])->name('produk.kategori');
        Route::get('analisis/kategori/{category}', [AnalisisController::class, 'kategori'])->name('analisis.kategori');
        Route::get('analisis', [AnalisisController::class, 'index']);
        Route::get('lab/{slug}', [LabController::class, 'show']);
        Route::get('order/{slug}', [OrderController::class, 'show'])->name('order');
    });
});
