<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\LowonganKerjaController;
use App\Http\Controllers\lowonganController;
use App\Http\Controllers\UsersController;


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

Route::get('/', 'AuthController@login')->name('login');
Route::get('/rekrutmen', function () {
    return view('welcome');
});
Route::get('/pengumuman', function () {
    return view('pengumuman');
});
Route::get('/pengumuman', 'UsersController@pengumuman');

Route::get('/users/register', 'UsersController@reg');
Route::post('/users/register', 'UsersController@register');


Route::post('/proseslogin', 'AuthController@proseslogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {

    //Akun
    Route::get('/akun', [UsersController::class, 'akun'])->name('akun');
    Route::post('admin/updateakun/{id}', 'UsersController@updateAkun')->name('updateakun');

    Route::get('/home', 'AdminController@home');
    Route::get('/admin/datausers', 'AdminController@index');
    Route::get('/admin/detail/{id}', 'AdminController@detailusers');
    Route::post('admin/updatestatus/{id}', 'AdminController@updateStatus')->name('updatestatus');

    Route::post('/admin/create', 'AdminController@create');
    Route::post('/admin/biodata/create', 'AdminController@biodatacreate');
    Route::get('/admin/{id}/detail', 'AdminController@detail');

    Route::get('/admin/{id}/diterima', 'AdminController@diterima');
    Route::get('/admin/{id}/ditolak', 'AdminController@ditolak');

    // --Batch--
    Route::get('/batches', [BatchController::class, 'index'])->name('batches.index');
    Route::get('/batches/create', [BatchController::class, 'create'])->name('batches.create');
    Route::post('/batches', [BatchController::class, 'store'])->name('batches.store');
    Route::get('/batches/{batch}', [BatchController::class, 'show'])->name('batches.show');
    Route::get('/batches/{batch}/edit', [BatchController::class, 'edit'])->name('batches.edit');
    Route::put('/batches/{batch}', [BatchController::class, 'update'])->name('batches.update');
    Route::delete('/batches/{batch}', [BatchController::class, 'destroy'])->name('batches.destroy');

    // --Departemen--
    Route::get('/departemens', [DepartemenController::class, 'index'])->name('departemens.index');
    Route::get('/departemens/create', [DepartemenController::class, 'create'])->name('departemens.create');
    Route::post('/departemens', [DepartemenController::class, 'store'])->name('departemens.store');
    Route::get('/departemens/{departemen}', [DepartemenController::class, 'show'])->name('departemens.show');
    Route::get('/departemens/{departemen}/edit', [DepartemenController::class, 'edit'])->name('departemens.edit');
    Route::put('/departemens/{departemen}', [DepartemenController::class, 'update'])->name('departemens.update');
    Route::delete('/departemens/{departemen}', [DepartemenController::class, 'destroy'])->name('departemens.destroy');

    //--Lowongan Kerja --
    Route::get('/lowongan_kerja', [LowonganKerjaController::class, 'index'])->name('lowongan_kerja.index');
    Route::get('/lowongan_kerja/create', [LowonganKerjaController::class, 'create'])->name('lowongan_kerja.create');
    Route::post('/lowongan_kerja/store', [LowonganKerjaController::class, 'store'])->name('lowongan_kerja-store');
    Route::get('/lowongan_kerja/{lowongan_kerja}/edit', [LowonganKerjaController::class, 'edit'])->name('lowongan_kerja.edit');
    Route::put('/lowongan_kerja/{lowongan_kerja}', [LowonganKerjaController::class, 'update'])->name('lowongan_kerja.update');
    Route::delete('/lowongan_kerja/{lowongan_kerja}', [LowonganKerjaController::class, 'destroy'])->name('lowongan_kerja.destroy');
});

Route::group(['middleware' => ['auth', 'ceklevel:user']], function () {

    //Akun
    Route::get('/akunuser', [UsersController::class, 'akun'])->name('akunuser');
    Route::post('admin/updateakunuser/{id}', 'UsersController@updateAkun')->name('updateakunuser');

    Route::get('/pelamar/biodata', 'UsersController@biodata');
    Route::post('/pelamar/{id}/update', 'UsersController@update');
    Route::get('/pelamar/uploadfile', 'UsersController@biodata2');
    Route::post('/pelamar/{id}/uploadfile', 'UsersController@file');
    Route::get('/pelamar/persetujuan', 'UsersController@biodata3');
    Route::post('/pelamar/{id}/persetujuan', 'UsersController@persetujuan');
    Route::get('/pelamar/final', 'UsersController@final');

    //--lowongan posting--
    Route::get('/lowongan_posting', [LowonganKerjaController::class, 'posting'])->name('pelamar.lowongan');
    Route::get('//lowongan/detail/{id}', [LowonganKerjaController::class, 'postingDetail']);

    Route::get('/lowongan/lamar/{id}', 'LowonganController@showLamarForm')->name('lowongan_kerja.form');
    Route::post('/lowongan/store', [LowonganController::class, 'store'])->name('lowongan_kerja.store');

    Route::get('/lowongan_saya', [LowonganKerjaController::class, 'lowongan_saya'])->name('lowongan_saya');

});
