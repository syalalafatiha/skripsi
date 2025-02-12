<?php

use App\Http\Controllers\AspekController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

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

//Proses Login-Logout
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'login_proses'])->name('login');
Route::get('/session', [SessionController::class, 'store'])->name('session.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

//Middleware
Route::middleware('auth:web')->group(function () {
    // Dashboard Admin
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/dashboard/admin', function () {
            return app(DashboardController::class)->adminDashboard();
        })->name('admin.dashboard');
    });
    // Dashboard User
    Route::middleware(['auth', 'role:user'])->group(function () {
        Route::get('/dashboard/user', function () {
            return app(DashboardController::class)->userDashboard();
        })->name('user.dashboard');
    });

    //Routing Menu
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('aspek', AspekController::class);
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('sub-kriteria', SubKriteriaController::class);
    Route::resource('users', UserController::class);
    Route::resource('export', ExportController::class);

    //Routing Proses Seleksi (Controller Hitung)
    Route::get('/hitung', [HitungController::class, 'index'])->name('hitung.index');
    Route::post('/hitung', [HitungController::class, 'store'])->name('hitung.store');
    Route::get('/hitung/hitung-gap', [HitungController::class, 'hitungGap'])->name('hitung.hitungGap');
    Route::post('/hitung/core', [HitungController::class, 'hitungCoreFactor'])->name('hitung.hitungCoreFactor');
    Route::post('/hitung/secondary', [HitungController::class, 'hitungSecondaryFactor'])->name('hitung.hitungSecondaryFactor');
    Route::get('/hitung/show', [HitungController::class, 'show'])->name('hitung.show');
    Route::get('/hitung/hasil', [HitungController::class, 'hasil'])->name('hitung.hasil');
    Route::get('/hitung/rangking', [HitungController::class, 'rangking'])->name('rangking.index');
    Route::delete('/hitung/{id}', [HitungController::class, 'destroy'])->name('hitung.destroy');

    //Routing Cetak Data Penerima
    Route::get('/export', [ExportController::class, 'index'])->name('export.index');
    Route::get('/export-seleksi', [ExportController::class, 'exportSeleksi'])->name('export.seleksi');
});
