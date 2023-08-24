<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\EskulController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\FrontDaftarController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\UbahPasswordController;

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
//---------------------------------------------------------------------------------//
//------------------------------- Back END --------------------------------------//
//-------------------------------------------------------------------------------//

//--- Login Menu-----//                             //--name('login')-- untuk menghindari bajak akun seperti /dashboard //
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); //index adalah parameter di Logincontroller
Route::post('/login', [LoginController::class, 'authenticate']); //auth adalah parameter di Logincontroller
Route::post('/logout', [LoginController::class, 'logout']);

//Halaman Profil
Route::resource('/profil', ProfilController::class)->middleware('auth');
Route::resource('/ubahpassword', UbahpasswordController::class)->middleware('auth');

// Halaman Dashboard admin - Guru 
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Route::get('/guru', [GuruController::class]);
Route::resource('/guru', GuruController::class)->middleware('auth');
// excel import
Route::get('/guruexportexcel', [GuruController::class, 'guruexportexcel']);
// pdf
Route::get('/guruexportpdf ', [GuruController::class, 'guruexportpdf']);

// Halaman Siswa
Route::resource('/siswa', SiswaController::class)->middleware('auth');
// excel import
Route::get('/siswaexportexcel', [SiswaController::class, 'siswaexportexcel']);
// pdf
Route::get('/siswaexportpdf ', [SiswaController::class, 'siswaexportpdf']);


// srat masuk
Route::resource('/suratmasuk', SuratMasukController::class)->middleware('auth');
// pdf
Route::get('/suratmasukexportpdf ', [SuratMasukController::class, 'suratmasukexportpdf']);
// excel import
Route::get('/suratmasukexportexcel', [SuratMasukController::class, 'suratmasukexportexcel']);


// srat kelaur
Route::resource('/suratkeluar', SuratKeluarController::class)->middleware('auth');
// pdf
Route::get('/suratkeluarexportpdf ', [SuratKeluarController::class, 'suratkeluarexportpdf']);
// excel import
Route::get('/suratkeluarexportexcel', [SuratKeluarController::class, 'suratkeluarexportexcel']);

// Blog
Route::resource('/blog', BlogController::class)->middleware('auth');

// galeri
Route::resource('/review', ReviewController::class)->middleware('auth');

// galeri
Route::resource('/galeri', GaleriController::class)->middleware('auth');

// eskul
Route::resource('/eskul', EskulController::class)->middleware('auth');

// prestasi
Route::resource('/prestasi', PrestasiController::class)->middleware('auth');

// pengaturan
Route::resource('/pengaturan', PengaturanController::class)->middleware('auth');

//---------------------------------------------------------------------------------//
//------------------------------- FRONT END --------------------------------------//
//-------------------------------------------------------------------------------//
Route::resource('/', FrontController::class);
Route::get('/tentangkami', [FrontController::class, 'tentangkami']);
Route::get('/blogku', [FrontController::class, 'blogku']);
Route::get('/galeriku', [FrontController::class, 'galeriku']);
Route::resource('/daftarsiswa', FrontDaftarController::class);
Route::get('/prestasiku', [FrontController::class, 'prestasiku']);
Route::get('/eskulku', [FrontController::class, 'eskulku']);