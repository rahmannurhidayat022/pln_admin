<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;

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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::controller(AuthController::class)->middleware('loggedin')->group(function() {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(PageController::class)->group(function() {
        Route::get('/', 'dashboard')->name('dashboard');
        Route::get('/data/karyawan', 'karyawan_view')->name('karyawan');
        Route::get('/data/karyawan/{id}', 'detailKaryawan')->name('karyawan.detail');
        Route::delete('/data/karyawan/{id}', 'removeRecord')->name('karyawan.delete');
        Route::post('/uploads', 'importFile')->name('uploads');
        Route::get('/edit/karyawan/{id}', 'formKaryawan')->name('formKaryawan');
        Route::put('/edit/karyawan/{id}', 'editKaryawan')->name('formKaryawan.put');
        Route::get('/data/charts', 'getChartData')->name('getChartData');
        Route::get('/data/tad', 'tad')->name('tad');
        Route::post('/uploads/tad', 'importFileTAD')->name('tad.uploads');
        //export excel karyawan
        Route::get('/export/karyawan', 'exportKaryawan')->name('export.karyawan');
        //export excel tad
        Route::get('/export/tad', 'exportTAD')->name('export.tad');

        Route::get('/data/bidang', 'bidangpage')->name('bidang');
        Route::post('/data/bidang', 'createbidang')->name('bidang.store');
        Route::delete('/data/bidang/{id}', 'deletebidang')->name('bidang.destroy');

        Route::get('/data/jabatan', 'jabatanpage')->name('jabatan');
        Route::post('/data/jabatan', 'createjabatan')->name('jabatan.store');
        Route::delete('/data/jabatan/{id}', 'deletejabatan')->name('jabatan.destroy');

        Route::get('/form-karyawan', 'formkaryawanpage')->name('formkaryawan');
    });
});