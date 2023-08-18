<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkorController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WelcomeController;
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
    return view('home');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('index');
    Route::get('/dashboard', [IndexController::class, 'index'])->name('index');
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}/update', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}/destroy', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::get('/skor', [SkorController::class, 'index'])->name('skor.index');
    Route::get('/skor/create', [SkorController::class, 'create'])->name('skor.create');
    Route::post('/skor/store', [SkorController::class, 'store'])->name('skor.store');
    Route::get('/skor/{id}/edit', [SkorController::class, 'edit'])->name('skor.edit');
    Route::put('/skor/{id}', [SkorController::class, 'update'])->name('skor.update');
    Route::delete('/skor/{id}', [SkorController::class, 'destroy'])->name('skor.destroy');

    Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
    Route::get('/review/create', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/review/{id}/edit', [ReviewController::class, 'edit'])->name('review.edit');
    Route::put('/review/{id}', [ReviewController::class, 'update'])->name('review.update');
    Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');
});


require __DIR__ . '/auth.php';
Route::get('/leaderboard', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/', [HomeController::class, 'index'])->name('home');
