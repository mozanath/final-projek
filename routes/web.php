<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\KategoriPakaianController;
use App\Http\Controllers\PakaianController;
use App\Http\Controllers\PembelianDetailController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    // Users (/login,/register)
    Route::resource('users', UserController::class);

    // Metode Pembayaran
    Route::resource('metode_pembayaran', MetodePembayaranController::class);

    // Pembelian
    Route::resource('pembelian', PembelianController::class);

    // Kategori Pakaian
    Route::resource('kategori_pakaian', KategoriPakaianController::class);

    // Pakaian
    Route::resource('pakaian', PakaianController::class);

    // Pembelian Detail
    Route::resource('pembelian_detail', PembelianDetailController::class);
});

// Untuk menangani rute yang dihasilkan oleh Sanctum
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/sanctum/csrf-cookie', function () {
        return response()->json(['message' => 'CSRF cookie berhasil diatur']);
    });
});

// Untuk menampilkan formulir login jika rute tidak ditemukan
Route::fallback(function () {
    return redirect('/login');
});

Auth::routes();



