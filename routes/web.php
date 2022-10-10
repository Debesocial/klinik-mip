<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [AuthController::class, 'home'])->name('public.index');
Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [LogoutController::class, 'store'])->name('logout');

Route::group(['middleware' => ['auth', 'checkRole:superadmin,dokter,apoteker,farmasi,perawat']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth', 'checkRole:superadmin']], function() {
    Route::get('/data/pasien', [SuperAdminController::class, 'datapasien'])->name('superadmin.datapasien');
    Route::get('/add/data/pasien', [SuperAdminController::class, 'addpasien'])->name('superadmin.adddatapasien');
    Route::post('/add/data/pasien', [SuperAdminController::class, 'tambahpasien'])->name('superadmin.tambahdatapasien');
    Route::get('/add/data/keluarga', [SuperAdminController::class, 'addkeluarga'])->name('superadmin.adddatakeluarga');
    Route::post('/add/data/keluarga', [SuperAdminController::class, 'tambahkeluarga'])->name('superadmin.tambahdatakeluarga');

    Route::get('/add/data/obat', [SuperAdminController::class, 'addobat'])->name('superadmin.adddataobat');
    Route::get('/data/obat', [SuperAdminController::class, 'dataobat'])->name('superadmin.dataobat');
    Route::post('/add/data/obat', [SuperAdminController::class, 'tambahobat'])->name('superadmin.tambahdataobat');
    Route::get('/ubah/data/obat/{id}', [SuperAdminController::class, 'ubahobat'])->name('superadmin.ubahdataobat');
    Route::post('/ubah/data/obat/{id}', [SuperAdminController::class, 'changeobat'])->name('superadmin.changedataobat');

    Route::get('/data/user', [SuperAdminController::class, 'datauser'])->name('superadmin.datauser');
    Route::get('/add/data/user', [SuperAdminController::class, 'adduser'])->name('superadmin.adddatauser');
    Route::post('/add/data/user', [SuperAdminController::class, 'tambahuser'])->name('superadmin.tambahdatauser');
    Route::get('/ubah/data/user/{id}', [SuperAdminController::class, 'ubahuser'])->name('superadmin.ubahdatauser');
    Route::post('/ubah/data/user/{id}', [SuperAdminController::class, 'changeuser'])->name('superadmin.changedatauser');

    Route::get('/lokasi/kejadian', [SuperAdminController::class, 'lokasikejadian'])->name('superadmin.lokasikejadian');
    Route::get('/add/lokasi/kejadian', [SuperAdminController::class, 'addlokasikejadian'])->name('superadmin.addlokasikejadian');
    Route::post('/add/lokasi/kejadian', [SuperAdminController::class, 'tambahlokasikejadian'])->name('superadmin.tambahlokasikejadian');
    Route::get('/ubah/lokasi/kejadian/{id}', [SuperAdminController::class, 'ubahlokasikejadian'])->name('superadmin.ubahlokasikejadian');
    Route::post('/ubah/lokasi/kejadian/{id}', [SuperAdminController::class, 'changelokasikejadian'])->name('superadmin.changelokasikejadian');

    Route::get('/rs/rujukan', [SuperAdminController::class, 'rsrujukan'])->name('superadmin.rsrujukan');
    Route::get('/add/rs/rujukan', [SuperAdminController::class, 'addrsrujukan'])->name('superadmin.addrsrujukan');
    Route::post('/add/rs/rujukan', [SuperAdminController::class, 'tambahrsrujukan'])->name('superadmin.tambahrsrujukan');
    Route::get('/ubah/rs/rujukan/{id}', [SuperAdminController::class, 'ubahrsrujukan'])->name('superadmin.ubahrsrujukan');
    Route::post('/ubah/rs/rujukan/{id}', [SuperAdminController::class, 'changersrujukan'])->name('superadmin.changersrujukan');

    Route::get('/spesialis/rujukan', [SuperAdminController::class, 'spesialisrujukan'])->name('superadmin.spesialisrujukan');
    Route::get('/add/spesialis/rujukan', [SuperAdminController::class, 'addspesialisrujukan'])->name('superadmin.addspesialisrujukan');
    Route::post('/add/spesialis/rujukan', [SuperAdminController::class, 'tambahspesialisrujukan'])->name('superadmin.tambahspesilaisrujukan');
    Route::get('/ubah/spesialis/rujukan/{id}', [SuperAdminController::class, 'ubahspesialisrujukan'])->name('superadmin.ubahspesialisrujukan');
    Route::post('/ubah/spesialis/rujukan/{id}', [SuperAdminController::class, 'changespesialisrujukan'])->name('superadmin.changespesialisrujukan');

    Route::get('/hasil/pemantauan', [SuperAdminController::class, 'hasilpemantauan'])->name('superadmin.hasilpemantauan');
    Route::get('/add/hasil/pemantauan', [SuperAdminController::class, 'addhasilpemantauan'])->name('superadmin.addhasilpemantauan');
    Route::post('/add/hasil/pemantauan', [SuperAdminController::class, 'tambahhasilpemantauan'])->name('superadmin.tambahhasilpemantauan');
    Route::get('/ubah/hasil/pemantauan/{id}', [SuperAdminController::class, 'ubahhasilpemantauan'])->name('superadmin.ubahhasilpemantauan');
    Route::post('/ubah/hasil/pemantauan/{id}', [SuperAdminController::class, 'changehasilpemantauan'])->name('superadmin.changehasilpemantauan');

    Route::get('/add/data/obat', [SuperAdminController::class, 'addobat'])->name('superadmin.adddataobat');
});

Route::group(['middleware' => ['auth', 'checkRole:perawat']], function() {
    Route::get('/perawat/daftar', [PerawatController::class, 'daftar'])->name('perawat.daftar');
});