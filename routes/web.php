<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarangController;

use App\Http\Controllers\JenisBarangController;

use App\Http\Controllers\HomeController;
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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/barang/show/{id}', [BarangController::class, 'show'])->name('barang.show');
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/delete/{id}', [BarangController::class, 'delete'])->name('barang.delete');

Route::get('/jenisbarang', [JenisBarangController::class, 'index'])->name('jenisbarang.index');
Route::post('/jenisbarang/store', [JenisBarangController::class, 'store'])->name('jenisbarang.store');
Route::put('/jenisbarang/update/{id}', [JenisBarangController::class, 'update'])->name('jenisbarang.update');
Route::delete('/jenisbarang/delete/{id}', [JenisBarangController::class, 'delete'])->name('jenisbarang.delete');



Route::resource('barang', BarangController::class);


Route::resource('jenisbarang', JenisBarangController::class)->except(['show']);
