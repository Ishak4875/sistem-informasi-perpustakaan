<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

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


Route::get('/',[BukuController::class,'getAllData'])->name('daftar buku');
Route::get('/buku/add',[BukuController::class,'displayPageAddBuku']);
Route::post('/buku/insert',[BukuController::class,'insertBuku']);
Route::get('/buku/edit/{id_buku}',[BukuController::class,'displayPageEditBuku']);
Route::post('/buku/update/{id_buku}',[BukuController::class,'updateBuku']);
Route::get('/buku/delete/{id_buku}',[BukuController::class,'deleteBuku']);
Route::get('/buku/detail/{id_buku}',[BukuController::class,'displayPageDetailBuku']);