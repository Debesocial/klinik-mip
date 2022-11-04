<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriPasienController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KlasifikasiPenyakitController;
use App\Http\Controllers\PemeriksaanAntigenController;
use App\Http\Controllers\SubKlasifikasiController;
use App\Http\Controllers\NamaPenyakitController;
use App\Http\Controllers\NamaObatController;
use App\Http\Controllers\BobotObatController;
use App\Http\Controllers\JenisObatController;
use App\Http\Controllers\GolonganObatController;
use App\Http\Controllers\SatuanObatController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\LevelController;
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

Route::group(['middleware' => ['auth', 'checkRole:superadmin,dokter,apoteker,farmasi']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

    Route::group(['middleware' => ['auth', 'checkRole:superadmin']], function () {

    Route::get('/pemeriksaan/narkoba', [SuperAdminController::class, 'pemeriksaannarkoba'])->name('superadmin.pemeriksaannarkoba');
    Route::post('/pemeriksaan/narkoba', [SuperAdminController::class, 'addpemeriksaannarkoba'])->name('superadmin.addpemeriksaannarkoba');

    Route::get('/pemeriksaan/covid', [SuperAdminController::class, 'pemeriksaancovid'])->name('superadmin.pemeriksaancovid');
    Route::post('/pemeriksaan/covid', [SuperAdminController::class, 'addpemeriksaancovid'])->name('superadmin.addpemeriksaancovid');

    Route::get('/pemantauan/covid', [SuperAdminController::class, 'pemantauancovid'])->name('superadmin.pemantauancovid');

    Route::get('/pemantauan/tandavital', [SuperAdminController::class, 'pemantauantandavital'])->name('superadmin.pemantauantandavital');

    Route::get('/rawat/inap', [SuperAdminController::class, 'rawatinap'])->name('superadmin.rawatinap');

    Route::get('/rawat/inap/dokter', [SuperAdminController::class, 'rawatinapdokter'])->name('superadmin.rawatinapdokter');

    Route::get('/rawat/inap/perawat', [SuperAdminController::class, 'rawatinapperawat'])->name('superadmin.rawatinapperawat');

    Route::get('/permintaan/makanan', [SuperAdminController::class, 'permintaanmakanan'])->name('superadmin.permintaanmakanan');

    Route::get('/kecelakaan/kerja', [SuperAdminController::class, 'kecelakaankerja'])->name('superadmin.kecelakaankerja');

    Route::get('/pengesahan/hasil', [SuperAdminController::class, 'pengesahanhasil'])->name('superadmin.pengesahanhasil');

    Route::get('/keterangan/pemeriksaan', [SuperAdminController::class, 'keteranganpemeriksaan'])->name('superadmin.keteranganpemeriksaan');

    Route::get('/keterangan/berobat', [SuperAdminController::class, 'keteranganberobat'])->name('superadmin.keteranganberobat');
    Route::post('/keterangan/berobat', [SuperAdminController::class, 'addketeranganberobat'])->name('superadmin.addketeranganberobat');

    Route::get('/data/izin/berobat', [SuperAdminController::class, 'dataizinberobat'])->name('superadmin.dataizinberobat');
    Route::get('/izin/berobat', [SuperAdminController::class, 'izinberobat'])->name('superadmin.izinberobat');
    Route::post('/izin/berobat', [SuperAdminController::class, 'addizinberobat'])->name('superadmin.addizinberobat');
    Route::get('/print/izin/berobat/{id}', [SuperAdminController::class, 'print'])->name('superadmin.printizinberobat');
    Route::get('/proses', [SuperAdminController::class, 'proses'])->name('proses');

    Route::get('/izin/istirahat', [SuperAdminController::class, 'izinistirahat'])->name('superadmin.izinistirahat');

    Route::get('/data/surat/rujukan', [SuperAdminController::class, 'datasuratrujukan'])->name('superadmin.datasuratrujukan');
    Route::get('/surat/rujukan', [SuperAdminController::class, 'suratrujukan'])->name('superadmin.suratrujukan');
    Route::post('/surat/rujukan', [SuperAdminController::class, 'addsuratrujukan'])->name('superadmin.addsuratrujukan');
    Route::get('/print/surat/rujukan/{id}', [SuperAdminController::class, 'printsuratrujukan'])->name('superadmin.printsuratrujukan');
    
    Route::get('rekam/medis', [SuperAdminController::class, 'rekammedis'])->name('superadmin.rekammedis');
    Route::post('/rekam/inqmedis', [SuperAdminController::class, 'autorekam'])->name('superadmin.rekammedisautocomplete');

    Route::get('/keterangan/sehat', [SuperAdminController::class, 'keterangansehat'])->name('superadmin.keterangansehat');

    Route::get('/persetujuan/tindakan/medis', [SuperAdminController::class, 'persetujuantindakanmedis'])->name('superadmin.persetujuantindakanmedis');

    Route::get('/pemeriksaan/antigen', [PemeriksaanAntigenController::class, 'pemeriksaanantigen'])->name('superadmin.pemeriksaanantigen');
    Route::get('/add/pemeriksaan/antigen', [PemeriksaanAntigenController::class, 'addpemeriksaanantigen'])->name('superadmin.addpemeriksaanantigen');
    Route::post('/add/pemeriksaan/antigen', [PemeriksaanAntigenController::class, 'tambahpemeriksaanantigen'])->name('superadmin.tambahpemeriksaanantigen');
    Route::get('/ubah/pemeriksaan/antigen/{id}', [PemeriksaanAntigenController::class, 'ubahpemeriksaanantigen'])->name('superadmin.ubahpemeriksaanantigen');
    Route::post('/ubah/pemeriksaan/antigen/{id}', [PemeriksaanAntigenController::class, 'changepemeriksaanantigen'])->name('superadmin.changepemeriksaanantigen');

    Route::get('/data/pasien', [SuperAdminController::class, 'datapasien'])->name('superadmin.datapasien');
    Route::get('/data/single/pasien', [SuperAdminController::class, 'datapasienById'])->name('superadmin.datapasien.id');
    Route::get('/add/data/pasien', [SuperAdminController::class, 'addpasien'])->name('superadmin.adddatapasien');
    Route::post('/add/data/pasien', [SuperAdminController::class, 'tambahpasien'])->name('add.pasien');
    Route::get('/add/data/keluarga', [SuperAdminController::class, 'addkeluarga'])->name('superadmin.adddatakeluarga');
    Route::post('/add/data/keluarga', [SuperAdminController::class, 'tambahkeluarga'])->name('superadmin.tambahdatakeluarga');
    Route::get('/ubah/data/pasien/{id}', [SuperAdminController::class, 'ubahpasien'])->name('superadmin.ubahdatapasien');
    Route::post('/ubah/data/pasien/{id}', [SuperAdminController::class, 'changepasien'])->name('superadmin.changedatapasien');

    Route::get('/mitra/kerja', [SuperAdminController::class, 'mitrakerja'])->name('superadmin.mitrakerja');
    Route::get('/add/mitra/kerja', [SuperAdminController::class, 'addmitrakerja'])->name('superadmin.addmitrakerja');
    Route::post('/add/mitra/kerja', [SuperAdminController::class, 'tambahmitrakerja'])->name('superadmin.tambahmitrakerja');
    Route::get('/ubah/mitra/kerja/{id}', [SuperAdminController::class, 'ubahmitrakerja'])->name('superadmin.ubahmitrakerja');
    Route::post('/ubah/mitra/kerja/{id}', [SuperAdminController::class, 'changemitrakerja'])->name('superadmin.changemitrakerja');

    Route::get('/add/data/obat', [SuperAdminController::class, 'addobat'])->name('superadmin.adddataobat');
    Route::get('/data/obat', [SuperAdminController::class, 'dataobat'])->name('superadmin.dataobat');
    Route::post('/add/data/obat', [SuperAdminController::class, 'tambahobat'])->name('superadmin.tambahdataobat');
    Route::get('/ubah/data/obat/{id}', [SuperAdminController::class, 'ubahobat'])->name('superadmin.ubahdataobat');
    Route::post('/ubah/data/obat/{id}', [SuperAdminController::class, 'changeobat'])->name('superadmin.changedataobat');

    Route::get('/jenis/obat', [JenisObatController::class, 'jenisobat'])->name('superadmin.jenisobat');
    Route::get('/add/jenis/obat', [JenisObatController::class, 'addjenisobat'])->name('superadmin.addjenisobat');
    Route::post('/add/jenis/obat', [JenisObatController::class, 'tambahjenisobat'])->name('superadmin.tambahjenisobat');
    Route::get('/ubah/jenis/obat/{id}', [JenisObatController::class, 'ubahjenisobat'])->name('superadmin.ubahjenisobat');
    Route::post('/ubah/jenis/obat/{id}', [JenisObatController::class, 'changejenisobat'])->name('superadmin.changejenisobat');

    Route::get('/nama/obat', [NamaObatController::class, 'namaobat'])->name('superadmin.namaobat');
    Route::get('/add/nama/obat', [NamaObatController::class, 'addnamaobat'])->name('superadmin.addnamaobat');
    Route::post('/add/nama/obat', [NamaObatController::class, 'tambahnamaobat'])->name('superadmin.tambahnamaobat');
    Route::get('/ubah/nama/obat/{id}', [NamaObatController::class, 'ubahnamaobat'])->name('superadmin.ubahnamaobat');
    Route::post('/ubah/nama/obat/{id}', [NamaObatController::class, 'changenamaobat'])->name('superadmin.changenamaobat');

    Route::get('/golongan/obat', [GolonganObatController::class, 'golonganobat'])->name('superadmin.golonganobat');
    Route::get('/add/golongan/obat', [GolonganObatController::class, 'addgolonganobat'])->name('superadmin.addgolonganobat');
    Route::post('/add/golongan/obat', [GolonganObatController::class, 'tambahgolonganobat'])->name('superadmin.tambahgolonganobat');
    Route::get('/ubah/golongan/obat/{id}', [GolonganObatController::class, 'ubahgolonganobat'])->name('superadmin.ubahgolonganobat');
    Route::post('/ubah/golongan/obat/{id}', [GolonganObatController::class, 'changegolonganobat'])->name('superadmin.changegolonganobat');

    Route::get('/satuan/obat', [SatuanObatController::class, 'satuanobat'])->name('superadmin.satuanobat');
    Route::get('/add/satuan/obat', [SatuanObatController::class, 'addsatuanobat'])->name('superadmin.addsatuanobat');
    Route::post('/add/satuan/obat', [SatuanObatController::class, 'tambahsatuanobat'])->name('superadmin.tambahsatuanobat');
    Route::get('/ubah/satuan/obat/{id}', [SatuanObatController::class, 'ubahsatuanobat'])->name('superadmin.ubahsatuanobat');
    Route::post('/ubah/satuan/obat/{id}', [SatuanObatController::class, 'changesatuanobat'])->name('superadmin.changesatuanobat');

    Route::get('/bobot/obat', [BobotObatController::class, 'bobotobat'])->name('superadmin.bobotobat');
    Route::get('/add/bobot/obat', [BobotObatController::class, 'addbobotobat'])->name('superadmin.addbobotobat');
    Route::post('/add/bobot/obat', [BobotObatController::class, 'tambahbobotobat'])->name('superadmin.tambahbobotobat');
    Route::get('/ubah/bobot/obat/{id}', [BobotObatController::class, 'ubahbobotobat'])->name('superadmin.ubahbobotobat');
    Route::post('/ubah/bobot/obat/{id}', [BobotObatController::class, 'changebobotobat'])->name('superadmin.changebobotobat');

    Route::get('/data/user', [SuperAdminController::class, 'datauser'])->name('superadmin.datauser');
    Route::get('/add/data/user', [SuperAdminController::class, 'adduser'])->name('superadmin.adddatauser');
    Route::post('/add/data/user', [SuperAdminController::class, 'tambahuser'])->name('superadmin.tambahdatauser');
    Route::get('/ubah/data/user/{id}', [SuperAdminController::class, 'ubahuser'])->name('superadmin.ubahdatauser');
    Route::post('/ubah/data/user/{id}', [SuperAdminController::class, 'changeuser'])->name('superadmin.changedatauser');

    Route::get('/jadwal', [SuperAdminController::class, 'jadwal'])->name('superadmin.jadwal');
    Route::get('/add/jadwal', [SuperAdminController::class, 'addjadwal'])->name('superadmin.addjadwal');
    Route::post('/add/jadwal', [SuperAdminController::class, 'tambahjadwal'])->name('superadmin.tambahjadwal');
    Route::get('/ubah/jadwal/{id}', [SuperAdminController::class, 'ubahjadwal'])->name('superadmin.ubahjadwal');
    Route::post('/ubah/jadwal/{id}', [SuperAdminController::class, 'changejadwal'])->name('superadmin.changejadwal');

    Route::get('/level', [LevelController::class, 'level'])->name('superadmin.level');
    Route::get('/add/level', [LevelController::class, 'addlevel'])->name('superadmin.addlevel');
    Route::post('/add/level', [LevelController::class, 'tambahlevel'])->name('superadmin.tambahlevel');
    Route::get('/ubah/level/{id}', [LevelController::class, 'ubahlevel'])->name('superadmin.ubahlevel');
    Route::post('/ubah/level/{id}', [LevelController::class, 'changelevel'])->name('superadmin.changelevel');

    Route::get('/kategori/pasien', [KategoriPasienController::class, 'kategoripasien'])->name('superadmin.kategoripasien');
    Route::get('/add/kategori/pasien', [KategoriPasienController::class, 'addkategoripasien'])->name('superadmin.addkategoripasien');
    Route::post('/add/kategori/pasien', [KategoriPasienController::class, 'tambahkategoripasien'])->name('superadmin.tambahkategoripasien');
    Route::get('/ubah/kategori/pasien/{id}', [KategoriPasienController::class, 'ubahkategoripasien'])->name('superadmin.ubahkategoripasien');
    Route::post('/ubah/kategori/pasien/{id}', [KategoriPasienController::class, 'changekategoripasien'])->name('superadmin.changekategoripasien');
    
    Route::get('/jabatan', [JabatanController::class, 'jabatan'])->name('superadmin.jabatan');
    Route::get('/add/jabatan', [JabatanController::class, 'addjabatan'])->name('superadmin.addjabatan');
    Route::post('/add/jabatan', [JabatanController::class, 'tambahjabatan'])->name('superadmin.tambahjabatan');
    Route::get('/ubah/jabatan/{id}', [JabatanController::class, 'ubahjabatan'])->name('superadmin.ubahjabatan');
    Route::post('/ubah/jabatan/{id}', [JabatanController::class, 'changejabatan'])->name('superadmin.changejabatan');

    Route::get('/perusahaan', [PerusahaanController::class, 'perusahaan'])->name('superadmin.perusahaan');
    Route::get('/add/perusahaan', [PerusahaanController::class, 'addperusahaan'])->name('superadmin.addperusahaan');
    Route::post('/add/perusahaan', [PerusahaanController::class, 'tambahperusahaan'])->name('superadmin.tambahperusahaan');
    Route::get('/ubah/perusahaan/{id}', [PerusahaanController::class, 'ubahperusahaan'])->name('superadmin.ubahperusahaan');
    Route::post('/ubah/perusahaan/{id}', [PerusahaanController::class, 'changeperusahaan'])->name('superadmin.changeperusahaan');

    Route::get('/divisi', [DivisiController::class, 'divisi'])->name('superadmin.divisi');
    Route::get('/add/divisi', [DivisiController::class, 'adddivisi'])->name('superadmin.adddivisi');
    Route::post('/add/divisi', [DivisiController::class, 'tambahdivisi'])->name('superadmin.tambahdivisi');
    Route::get('/ubah/divisi/{id}', [DivisiController::class, 'ubahdivisi'])->name('superadmin.ubahdivisi');
    Route::post('/ubah/divisi/{id}', [DivisiController::class, 'changedivisi'])->name('superadmin.changedivisi');

    Route::get('/klasifikasi/penyakit', [KlasifikasiPenyakitController::class, 'klasifikasipenyakit'])->name('superadmin.klasifikasipenyakit');
    Route::get('/add/klasifikasi/penyakit', [KlasifikasiPenyakitController::class, 'addklasifikasipenyakit'])->name('superadmin.addklasifikasipenyakit');
    Route::post('/add/klasifikasi/penyakit', [KlasifikasiPenyakitController::class, 'tambahklasifikasipenyakit'])->name('superadmin.tambahklasifikasipenyakit');
    Route::get('/ubah/klasifikasi/penyakit/{id}', [KlasifikasiPenyakitController::class, 'ubahklasifikasipenyakit'])->name('superadmin.ubahklasifikasipenyakit');
    Route::post('/ubah/klasifikasi/penyakit/{id}', [KlasifikasiPenyakitController::class, 'changeklasifikasipenyakit'])->name('superadmin.changeklasifikasipenyakit');

    Route::get('/sub/klasifikasi', [SubKlasifikasiController::class, 'subklasifikasi'])->name('superadmin.subklasifikasi');
    Route::get('/add/sub/klasifikasi', [SubKlasifikasiController::class, 'addsubklasifikasi'])->name('superadmin.addsubklasifikasi');
    Route::post('/add/sub/klasifikasi', [SubKlasifikasiController::class, 'tambahsubklasifikasi'])->name('superadmin.tambahsubklasifikasi');
    Route::get('/ubah/sub/klasifikasi/{id}', [SubKlasifikasiController::class, 'ubahsubklasifikasi'])->name('superadmin.ubahsubklasifikasi');
    Route::post('/ubah/sub/klasifikasi/{id}', [SubKlasifikasiController::class, 'changesubklasifikasi'])->name('superadmin.changesubklasifikasi');

    Route::get('/nama/penyakit', [NamaPenyakitController::class, 'namapenyakit'])->name('superadmin.namapenyakit');
    Route::get('/add/nama/penyakit', [NamaPenyakitController::class, 'addnamapenyakit'])->name('superadmin.addnamapenyakit');
    Route::post('/add/nama/penyakit', [NamaPenyakitController::class, 'tambahnamapenyakit'])->name('superadmin.tambahnamapenyakit');
    Route::get('/ubah/nama/penyakit/{id}', [NamaPenyakitController::class, 'ubahnamapenyakit'])->name('superadmin.ubahnamapenyakit');
    Route::post('/ubah/nama/penyakit/{id}', [NamaPenyakitController::class, 'changenamapenyakit'])->name('superadmin.changenamapenyakit');
    
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

Route::group(['middleware' => ['auth', 'checkRole:perawat']], function () {
    Route::get('/perawat/daftar', [PerawatController::class, 'daftar'])->name('perawat.daftar');
    Route::get('/perawat', [DashboardController::class, 'indexperawat'])->name('dashboard1');
});
