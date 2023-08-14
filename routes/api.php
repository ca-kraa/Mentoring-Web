<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/siswa', [ApiController::class, 'index']);
Route::get('/siswa/{id}', [ApiController::class, 'show']);
Route::post('/siswa', [ApiController::class, 'store']);
Route::put('/siswaupdate/{id}', [ApiController::class, 'update']);
Route::delete('/siswahapus/{id}', [ApiController::class, 'destroy']);
