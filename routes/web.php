<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PemesanankuController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TipeKamarController;

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

Route::prefix('/booking')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('booking-home');
    Route::get('/listkamar', [HomeController::class, 'listkamar'])->name('booking-listkamar');
    Route::get('/about', [HomeController::class, 'about'])->name('booking-about');
    Route::get('/logout', [LogInController::class, 'logout'])->name('booking-logout');
    Route::get('/login', [LogInController::class, 'index'])->name('booking-login')->middleware('guest');
    Route::get('/signup', [SignUpController::class, 'index'])->name('booking-signup')->middleware('guest');
    Route::post('/savesignup', [SignUpController::class, 'savesignup'])->name('booking-simpan-tamu');
    Route::get('/signup', [SignUpController::class, 'index'])->name('booking-signup');
    Route::post('/authlogin', [LogInController::class, 'authenticate'])->name('booking-auth-login');
    Route::get('/pemesananku', [PemesanankuController::class, 'index'])->name('booking-pemesananku')->middleware('auth');
    Route::get('/pesan/{kamar_id}', [PemesanankuController::class, 'pesan'])->name('booking-kamar')->middleware('auth');
    Route::post('/pesan/simpan', [PemesanankuController::class, 'simpanpesan'])->name('booking-simpanpesan')->middleware('auth');
    Route::post('/pesan/bayar', [PemesanankuController::class, 'bayar'])->name('booking-bayar')->middleware('auth');

    Route::group(['middleware' =>'admin'], function(){
        Route::resource('/tipekamar', TipeKamarController::class);
        Route::get('/room', [RoomController::class, 'room'])->name('room.index');
        Route::get('/addroom', [RoomController::class, 'addnewroom'])->name('addnewroom');
        Route::post('/saveroom',[RoomController::class,'savenewroom'])->name('savenewroom');
        Route::get('/detailroom/{id}',[RoomController::class,'detailroom'])->name('detailroom');
        Route::get('/editroom/{id}',[RoomController::class,'editroom'])->name('editroom');
        Route::patch('/saveeditroom/{kamar}',[RoomController::class,'saveeditroom'])->name('saveeditroom');
        Route::get('/deleteroom/{id}',[RoomController::class,'deleteroom'])->name('deleteroom');

        Route::get('/admin', [AdminController::class, 'index'])->name('admin-dashboard');
        Route::get('/verif/gagal/{booking_id}', [AdminController::class, 'gagal'])->name('admin-gagal');
        Route::get('/verif/selesai/{booking_id}', [AdminController::class, 'selesai'])->name('admin-selesai');
        Route::post('/verif/terima', [AdminController::class, 'verifTerima'])->name('admin-verifikasi');
        Route::post('/verif/tolak', [AdminController::class, 'verifTolak'])->name('admin-tolakverifikasi');
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    });
});

Route::prefix('/profile')->group(function(){
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile-profile')->withoutmiddleware('auth');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile-edit');
    Route::post('/update', [ProfileController::class, 'update'])->name('profile-update');
});
