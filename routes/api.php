<?php

use App\Http\Controllers\CutiController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('karyawan',KaryawanController::class);

Route::apiResource('cuti',CutiController::class);

Route::get('/karyawan-terlama',[KaryawanController::class,'karyawanTerlama']);

Route::get('/pernah-cuti',[KaryawanController::class,'pernahCuti']);

Route::get('/sisa-cuti',[KaryawanController::class,'sisaCuti']);