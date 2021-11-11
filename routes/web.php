<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiwayatLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('index');
})->name('home');

Route::prefix('dashboard')->group(function () {

    // Authentication
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', 'App\Http\Controllers\LoginController@login')->name('login');
        Route::post('/login', 'App\Http\Controllers\LoginController@authenticate')->name('authenticate');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
        Route::resource('/', 'App\Http\Controllers\DashboardController')->only(['index']);

        // Pemeriksaan
        Route::namespace('App\Http\Controllers\Pemeriksaan')->group(function () {
            Route::get('/pemeriksaan/rutin', 'PemeriksaanKriteriaController@indexRutin')->name('pemeriksaan.rutin');
            Route::get('/pemeriksaan/khusus', 'PemeriksaanKriteriaController@indexKhusus')->name('pemeriksaan.khusus');
            Route::get('/pemeriksaan/tujuan-lain', 'PemeriksaanKriteriaController@indexTujuanLain')->name('pemeriksaan.tujuan-lain');

            Route::resource('/pemeriksaan', 'PemeriksaanController')->except('index');
            Route::resource('/pemeriksaan/progress', 'PemeriksaanProgressController')->only('edit', 'update');
        });

        Route::resource('/daftar-user', 'App\Http\Controllers\DaftarUserController');
        Route::resource('/surat-ketetapan-pajak', 'App\Http\Controllers\SuratKetetapanPajakController');

        Route::get('riwayat-login', [RiwayatLoginController::class, 'index'])->name('riwayat-login');
    });
});
