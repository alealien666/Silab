<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\LabController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\user\OrderController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\user\AnalisisController;

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

Route::get('/home', [HomeController::class, 'index']);
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['auth', 'role:1'])->group(function () {
        Route::get('/user', function () {
            return view('/auth.user.profile', [
                'title' => 'Silab | User'
            ]);
        });
        Route::get('/order/{slug}', [OrderController::class, 'show'])->name('order')->middleware('CheckOrder');
        Route::post('order', [OrderController::class, 'store'])->name('orderLab');
        Route::get('/lab', [LabController::class, 'index'])->name('index');
        Route::get('/produk/kategori/{category}', [LabController::class, 'kategori'])->name('produk.kategori');
        Route::get('/analisis/kategori/{category}', [AnalisisController::class, 'kategori'])->name('analisis.kategori');
        Route::get('/analisis', [AnalisisController::class, 'index'])->name('analisis');
        Route::get('/lab/{slug}', [LabController::class, 'show']);
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});
