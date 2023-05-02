<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\AduanController as MainAduan;
use App\Http\Controllers\Main\ArsipController as MainArsip;
use App\Http\Controllers\Main\LandingController as MainLanding;

use App\Http\Controllers\Admin\AduanController as AdminAduan;
use App\Http\Controllers\Admin\ArsipController as AdminArsip;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\KlasifikasiController as AdminKlasifikasi;
use App\Http\Controllers\Admin\PengelolaController as AdminPengelola;
use App\Http\Controllers\Admin\ProfileController as AdminProfile;
use App\Http\Controllers\Admin\AuthController;

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

Route::get('/', [MainLanding::class, 'index'])->name('home');
Route::get('arsip', [MainArsip::class, 'index'])->name('main.arsip.index');
Route::get('arsip-api', [MainArsip::class, 'indexAPI'])->name('main.arsip-api.index');
Route::get('arsip/{arsip}', [MainArsip::class, 'show'])->name('main.arsip.show');
Route::post('aduan', [MainAduan::class, 'store'])->name('main.aduan.store');
Route::get('aduan/{aduan}', [MainAduan::class, 'show'])->name('main.aduan.show');

Route::get('login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('login', [AuthController::class, 'doLogin'])->name('login.do');
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->middleware('guest')->name('forgot-password');
Route::post('forgot-password', [AuthController::class, 'sendForgotPasswordToken'])->middleware('guest')->name('forgot-password.send');
Route::get('reset-password/{token}', [AuthController::class, 'resetPassword'])->middleware('guest')->name('reset-password');
Route::post('reset-password/{token}', [AuthController::class, 'savePassword'])->middleware('guest')->name('reset-password.save');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');

    Route::get('admin/show/{admin}', [AdminArsip::class, 'index'])->name('admin.show');

    Route::get('aduan', [AdminAduan::class, 'index'])->name('aduan');
    Route::get('aduan/show/{aduan}', [AdminAduan::class, 'show'])->name('aduan.show');
    Route::post('aduan/show/{aduan}/{status}', [AdminAduan::class, 'update'])->name('aduan.update');

    Route::get('arsip', [AdminArsip::class, 'index'])->name('arsip');
    Route::get('arsip/create', [AdminArsip::class, 'create'])->name('arsip.create');
    Route::post('arsip/create', [AdminArsip::class, 'store'])->name('arsip.store');
    Route::get('arsip/show/{arsip}', [AdminArsip::class, 'show'])->name('arsip.show');
    Route::post('arsip/show/{arsip}', [AdminArsip::class, 'update'])->name('arsip.update');
    Route::post('arsip/show/{arsip}/lampiran', [AdminArsip::class, 'lampiranStore'])->name('arsip.lampiran.store');
    Route::delete('arsip/show/{arsip}/lampiran/{lampiran}', [AdminArsip::class, 'lampiranDestroy'])->name('arsip.lampiran.destroy');

    Route::get('klasifikasi', [AdminKlasifikasi::class, 'index'])->name('klasifikasi');
    Route::get('klasifikasi/create', [AdminKlasifikasi::class, 'create'])->name('klasifikasi.create');
    Route::post('klasifikasi/create', [AdminKlasifikasi::class, 'store'])->name('klasifikasi.store');
    Route::get('klasifikasi/show/{klasifikasi}', [AdminKlasifikasi::class, 'show'])->name('klasifikasi.show');
    Route::post('klasifikasi/show/{klasifikasi}', [AdminKlasifikasi::class, 'update'])->name('klasifikasi.update');
    Route::delete('klasifikasi/show/{klasifikasi}', [AdminKlasifikasi::class, 'destroy'])->name('klasifikasi.destroy');

    Route::get('pengelola', [AdminPengelola::class, 'index'])->name('pengelola');
    Route::get('pengelola/create', [AdminPengelola::class, 'create'])->name('pengelola.create');
    Route::post('pengelola/create', [AdminPengelola::class, 'store'])->name('pengelola.store');
    Route::get('pengelola/show/{pengelola}', [AdminPengelola::class, 'show'])->name('pengelola.show');
    Route::post('pengelola/show/{pengelola}', [AdminPengelola::class, 'update'])->name('pengelola.update');

    Route::get('profile', [AdminProfile::class, 'index'])->name('profile');
    Route::post('profile', [AdminProfile::class, 'update'])->name('profile.update');
    Route::post('profile/password', [AdminProfile::class, 'updatePassword'])->name('profile.update-password');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
