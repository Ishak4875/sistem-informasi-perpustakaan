<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Auth;
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
Route::post('/buku/insert',[BukuController::class,'addBuku']);
Route::get('/buku/edit/{id_buku}',[BukuController::class,'displayPageEditBuku']);
Route::post('/buku/update/{id_buku}',[BukuController::class,'editBuku']);
Route::get('/buku/delete/{id_buku}',[BukuController::class,'removeBuku']);
Route::get('/buku/detail/{id_buku}',[BukuController::class,'displayPageDetailBuku']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
