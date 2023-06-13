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
use App\Http\Controllers\AlkesController;
use App\Http\Controllers\ProdukController;
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
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\PemeriksaanNarkobaController;
use App\Http\Controllers\PemeriksaanCovidController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\IzinIstirahatController;
use App\Http\Controllers\PermintaanMakananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RawatInapController;
use App\Http\Controllers\RawatJalanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstruksiDokterController;
use App\Http\Controllers\McuController;
use App\Http\Controllers\IntervensiKeperawatanController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\TandaVitalController;
use App\Models\IzinIstirahat;
use App\Models\PermintaanMakanan;

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

Route::group(['middleware' => ['auth', 'checkRole:superadmin,dokter,apoteker,tenaga teknis kefarmasian,perawat']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth', 'checkRole:superadmin,apoteker,dokter,perawat']], function () {

    Route::get('/{id}/password', [DivisiController::class, 'password'])->name('superadmin.password');

    Route::get('/ubah/password/{id}', [ProfileController::class, 'ubahpassword'])->name('superadmin.ubahpassword');
    Route::post('/ubah/password/{id}', [ProfileController::class, 'changepassword'])->name('superadmin.changepassword');

    Route::get('/ubah/profile/{id}', [ProfileController::class, 'ubahprofile'])->name('profile.ubahprofile');
    Route::post('/ubah/profile/{id}', [ProfileController::class, 'changeprofile'])->name('profile.changeprofile');

    Route::get('/data/pemeriksaan/narkoba', [PemeriksaanNarkobaController::class, 'datapemeriksaannarkoba'])->name('pemeriksaan.datapemeriksaannarkoba');
    Route::get('/view/pemeriksaan/narkoba/{id}', [PemeriksaanNarkobaController::class, 'viewpemeriksaannarkoba'])->name('pemeriksaan.viewpemeriksaannarkoba');
    Route::get('/ubah/pemeriksaan/narkoba/{id}', [PemeriksaanNarkobaController::class, 'ubahpemeriksaannarkoba'])->name('pemeriksaan.ubahpemeriksaannarkoba');
    Route::post('/ubah/pemeriksaan/narkoba/{id}', [PemeriksaanNarkobaController::class, 'changepemeriksaannarkoba'])->name('pemeriksaan.changepemeriksaannarkoba');
    Route::get('/periksa/narkoba', [SuperAdminController::class, 'periksanarkoba'])->name('superadmin.periksanarkoba');
    Route::post('/periksa/narkoba', [SuperAdminController::class, 'addperiksanarkoba'])->name('superadmin.addperiksanarkoba');
    Route::get('/pemeriksaan/narkotika/{id}', [PemeriksaanNarkobaController::class, 'pemeriksaannarkotika'])->name('superadmin.pemeriksaannarkotika');
    Route::post('/pemeriksaan/narkotika/{id}', [PemeriksaanNarkobaController::class, 'addpemeriksaannarkotika'])->name('superadmin.addpemeriksaannarkotika');
    Route::get('/print/pemeriksaan/narkoba/{id}', [PemeriksaanNarkobaController::class, 'printpemeriksaannarkoba'])->name('pemeriksaan.printpemeriksaannarkoba');

    Route::get('/data/pemeriksaan/covid/{position?}', [PemeriksaanCovidController::class, 'datapemeriksaancovid'])->name('pemeriksaan.datapemeriksaancovid');
    Route::get('/view/pemeriksaan/covid/{id}', [PemeriksaanCovidController::class, 'viewpemeriksaancovid'])->name('pemeriksaan.viewpemeriksaancovid');
    Route::get('/pemeriksaan/covid', [SuperAdminController::class, 'pemeriksaancovid'])->name('superadmin.pemeriksaancovid');
    Route::post('/pemeriksaan/covid', [SuperAdminController::class, 'addpemeriksaancovid'])->name('superadmin.addpemeriksaancovid');
    Route::get('/add/pemeriksaan/covid/{id}', [PemeriksaanCovidController::class, 'nambahpemeriksaancovid'])->name('pemeriksaan.nambahpemeriksaancovid');
    Route::post('/add/pemeriksaan/covid/{id}', [PemeriksaanCovidController::class, 'tambahpemeriksaancovid'])->name('pemeriksaan.tambahpemeriksaancovid');
    Route::get('/ubah/pemeriksaan/covid/{id}', [PemeriksaanCovidController::class, 'ubahpemeriksaancovid'])->name('superadmin.ubahpemeriksaancovid');
    Route::post('/ubah/pemeriksaan/covid/{id}', [PemeriksaanCovidController::class, 'changepemeriksaancovid'])->name('superadmin.changepemeriksaancovid');

    // Route::get('/data/pemantauan/covid', [SuperAdminController::class, 'datapemantauancovid'])->name('superadmin.datapemantauancovid');
    Route::get('/pemantauan/covid', [SuperAdminController::class, 'pemantauancovid'])->name('superadmin.pemantauancovid');
    Route::post('/pemantauan/covid', [SuperAdminController::class, 'addpemantauancovid'])->name('superadmin.addpemantauancovid');
    Route::get('/pantau/covid/{id}', [SuperAdminController::class, 'pantaucovid'])->name('superadmin.pantaucovid');
    Route::post('/pantau/covid/{id}', [SuperAdminController::class, 'addpantaucovid'])->name('superadmin.addpantaucovid');
    Route::get('/view/pemantauan/covid/{id}', [SuperAdminController::class, 'viewpemantauancovid'])->name('superadmin.viewpemantauancovid');
    Route::get('/ubah/pemantauan/covid/{id}', [SuperAdminController::class, 'ubahpemantauancovid'])->name('superadmin.ubahpemantauancovid');
    Route::post('/ubah/pemantauan/covid/{id}', [SuperAdminController::class, 'changepemantauancovid'])->name('superadmin.changepemantauancovid');

    Route::get('/data/pemantauan/tandavital', [SuperAdminController::class, 'datapemantauantandavital'])->name('superadmin.datapemantauantandavital');
    Route::get('/pemantauan/tandavital', [SuperAdminController::class, 'pemantauantandavital'])->name('superadmin.pemantauantandavital');
    Route::post('/pemantauan/tandavital', [SuperAdminController::class, 'addpemantauantandavital'])->name('superadmin.addpemantauantandavital');
    Route::get('/view/pemantauan/tandavital/{id}', [SuperAdminController::class, 'viewpemantauantandavital'])->name('superadmin.viewpemantauantandavital');
    Route::get('/ubah/pemantauan/tandavital/{id}', [SuperAdminController::class, 'ubahpemantauantandavital'])->name('superadmin.ubahpemantauantandavital');
    Route::post('/ubah/pemantauan/tandavital/{id}', [SuperAdminController::class, 'changepemantauantandavital'])->name('superadmin.changepemantauantandavital');

    Route::get('/daftar/rawat/inap', [RawatInapController::class, 'daftarrawatinap'])->name('superadmin.daftarrawatinap');
    Route::get('/view/rawat/inap/{id}/{pos}', [RawatInapController::class, 'viewrawatinap'])->name('rawatinap.viewrawatinap');
    Route::get('/view/rawat/inap/{id}', [RawatInapController::class, 'viewrawatinap'])->name('rawatinap.viewrawatinap');
    Route::get('/ubah/rawat/inap/{id}', [RawatInapController::class, 'ubahrawatinap'])->name('rawatinap.ubahrawatinap');
    Route::post('/ubah/rawat/inap/{id}', [RawatInapController::class, 'changerawatinap'])->name('rawatinap.changerawatinap');
    Route::get('/add/rawat/inap', [RawatInapController::class, 'addrawatinap'])->name('rawatinap.addrawatinap');
    Route::post('/add/rawat/inap', [RawatInapController::class, 'tambahrawatinap'])->name('rawatinap.tambahrawatinap');
    Route::get('/rawat/inap/dokter', [SuperAdminController::class, 'rawatinapdokter'])->name('superadmin.rawatinapdokter');
    Route::get('/rawat/inap/perawat', [SuperAdminController::class, 'rawatinapperawat'])->name('superadmin.rawatinapperawat');
    Route::get('/detail/rawatinap/{id}', [RawatInapController::class, 'detail']);
    Route::get('/selesai-inap/{id}', [RawatInapController::class, 'selesaiInap']);

    Route::get('/instruksi_dokter/form_tambah/{id}', [InstruksiDokterController::class, 'tampilFormTambah']);
    Route::get('/instruksi_dokter/form_edit/{id}', [InstruksiDokterController::class, 'tampilFormUbah']);
    Route::post('/instruksi_dokter/tambah', [InstruksiDokterController::class, 'simpan']);
    Route::post('/instruksi_dokter/ubah/{id}', [InstruksiDokterController::class, 'ubah']);
    Route::get('/instruksi_dokter/{id}', [InstruksiDokterController::class, 'tampil']);

    Route::get('/intervensi/{id}', [IntervensiKeperawatanController::class, 'tampil']);
    Route::get('/intervensi/form_tambah/{id}', [IntervensiKeperawatanController::class, 'tampilFormTambah']);
    Route::post('/intervensi/tambah', [IntervensiKeperawatanController::class, 'simpan']);
    Route::get('/intervensi/form_edit/{id}', [IntervensiKeperawatanController::class, 'tampilFormUbah']);
    Route::post('/intervensi/ubah/{id}', [IntervensiKeperawatanController::class, 'ubah']);

    Route::get('/permintaan_makanan/tambah/{id}', [PermintaanMakananController::class, 'tampilFormTambah']);
    Route::get('/permintaan_makanan/{id}', [PermintaanMakananController::class, 'tampil']);
    Route::post('/permintaan_makanan/tambah', [PermintaanMakananController::class, 'simpan']);
    Route::get('/permintaan_makanan/form_edit/{id}', [PermintaanMakananController::class, 'tampilFormUbah']);
    Route::post('/permintaan_makanan/ubah/{id}', [PermintaanMakananController::class, 'ubah']);

    Route::get('/tanda_vital/{id}', [TandaVitalController::class, 'tampil']);
    Route::get('/tanda_vital/tambah/{id}', [TandaVitalController::class, 'tampilFormTambah']);
    Route::post('/tanda_vital/tambah', [TandaVitalController::class, 'simpan']);
    Route::get('/tanda_vital/form_edit/{id}', [TandaVitalController::class, 'tampilFormUbah']);
    Route::post('/tanda_vital/ubah/{id}', [TandaVitalController::class, 'ubah']);
    Route::get('/tanda_vital/grafik/{id}', [TandaVitalController::class, 'grafik']);


    Route::get('/daftar/rawat/jalan', [RawatJalanController::class, 'daftarrawatjalan'])->name('rawatjalan.daftarrawatjalan');
    Route::get('/add/rawat/jalan', [RawatJalanController::class, 'addrawatjalan'])->name('rawatjalan.addrawatjalan');
    Route::post('/add/rawat/jalan', [RawatJalanController::class, 'tambahrawatjalan'])->name('rawatjalan.tambahrawatjalan');
    Route::get('/view/rawat/jalan/{id}', [RawatJalanController::class, 'viewrawatjalan'])->name('rawatjalan.viewrawatjalan');
    Route::get('/ubah/rawat/jalan/{id}', [RawatJalanController::class, 'ubahrawatjalan'])->name('rawatjalan.ubahrawatjalan');
    Route::post('/ubah/rawat/jalan/{id}', [RawatJalanController::class, 'changerawatjalan'])->name('rawatjalan.changerawatjalan');

    Route::get('/data/permintaan/makanan', [PermintaanMakananController::class, 'datapermintaanmakanan'])->name('makanan.datapermintaanmakanan');
    Route::get('/permintaan/makanan', [SuperAdminController::class, 'permintaanmakanan'])->name('superadmin.permintaanmakanan');

    Route::get('/kecelakaan/kerja', [SuperAdminController::class, 'kecelakaankerja'])->name('superadmin.kecelakaankerja');

    Route::get('/pengesahan/hasil', [SuperAdminController::class, 'pengesahanhasil'])->name('superadmin.pengesahanhasil');
    Route::post('/pengesahan/hasil', [SuperAdminController::class, 'addpengesahanhasil'])->name('superadmin.addpengesahanhasil');

    Route::get('/keterangan/pemeriksaan', [SuperAdminController::class, 'keteranganpemeriksaan'])->name('superadmin.keteranganpemeriksaan');
    Route::post('/keterangan/pemeriksaan', [SuperAdminController::class, 'addketeranganpemeriksaan'])->name('superadmin.addketeranganpemeriksaan');

    Route::get('/data/keterangan/berobat', [SuperAdminController::class, 'dataketeranganberobat'])->name('superadmin.dataketeranganberobat');
    Route::get('/keterangan/berobat', [SuperAdminController::class, 'keteranganberobat'])->name('superadmin.keteranganberobat');
    Route::post('/keterangan/berobat', [SuperAdminController::class, 'addketeranganberobat'])->name('superadmin.addketeranganberobat');
    Route::get('/print/ket/berobat/{id}', [SuperAdminController::class, 'printketberobat'])->name('superadmin.printketberobat');
    Route::get('/ubah/ket/berobat/{id}', [SuperAdminController::class, 'ubahketberobat'])->name('superadmin.ubahketberobat');
    Route::post('/ubah/ket/berobat/{id}', [SuperAdminController::class, 'changeketberobat'])->name('superadmin.changeketberobat');

    Route::get('/data/izin/berobat', [SuperAdminController::class, 'dataizinberobat'])->name('superadmin.dataizinberobat');
    Route::get('/izin/berobat', [SuperAdminController::class, 'izinberobat'])->name('superadmin.izinberobat');
    Route::post('/izin/berobat', [SuperAdminController::class, 'addizinberobat'])->name('superadmin.addizinberobat');
    Route::get('/view/izin/berobat/{id}', [SuperAdminController::class, 'viewizinberobat'])->name('superadmin.viewizinberobat');
    Route::get('/print/izin/berobat/{id}', [SuperAdminController::class, 'print'])->name('superadmin.printizinberobat');
    Route::get('/proses', [SuperAdminController::class, 'proses'])->name('proses');
    Route::get('/ubah/izin/berobat/{id}', [SuperAdminController::class, 'ubahizinberobat'])->name('superadmin.ubahizinberobat');
    Route::post('/ubah/izin/berobat/{id}', [SuperAdminController::class, 'changeizinberobat'])->name('superadmin.changeizinberobat');

    Route::get('/data/izin/istirahat', [IzinIstirahatController::class, 'dataizinistirahat'])->name('istirahat.dataizinistirahat');
    Route::get('/izin/istirahat', [SuperAdminController::class, 'izinistirahat'])->name('superadmin.izinistirahat');
    Route::get('/izin_istirahat', [IzinIstirahatController::class, 'create']);
    Route::get('/ubah/izin_istirahat/{id}', [IzinIstirahatController::class, 'edit']);
    Route::post('/izin_istirahat', [IzinIstirahatController::class, 'store']);
    Route::post('/ubah/izin_istirahat/{id}', [IzinIstirahatController::class, 'update']);

    Route::get('/data/surat/rujukan', [SuperAdminController::class, 'datasuratrujukan'])->name('superadmin.datasuratrujukan');
    Route::get('/surat/rujukan', [SuperAdminController::class, 'suratrujukan'])->name('superadmin.suratrujukan');
    Route::post('/surat/rujukan', [SuperAdminController::class, 'addsuratrujukan'])->name('superadmin.addsuratrujukan');
    Route::get('/ubah/surat/rujukan/{id}', [SuperAdminController::class, 'ubahsuratrujukan'])->name('superadmin.ubahdatasuratrujukan');
    Route::post('/ubah/surat/rujukan/{id}', [SuperAdminController::class, 'changesuratrujukan'])->name('superadmin.changedatasuratrujukan');
    Route::get('/print/surat/rujukan/{id}', [SuperAdminController::class, 'printsuratrujukan'])->name('superadmin.printsuratrujukan');

    Route::get('/view/rekam/medis/{id}', [RekamMedisController::class, 'viewrekammedis'])->name('rekammedis.viewrekammedis');
    Route::get('/data/rekam/medis', [RekamMedisController::class, 'datarekammedis'])->name('rekammedis.datarekammedis');
    Route::get('rekam/medis', [SuperAdminController::class, 'rekammedis'])->name('superadmin.rekammedis');
    Route::post('/rekam/medis', [SuperAdminController::class, 'autorekam'])->name('superadmin.rekammedisautocomplete');
    Route::get('/lihat/rekam/medis/{id}', [RekamMedisController::class, 'lihatrekammedis'])->name('rekammedis.lihatrekammedis');

    Route::get('data/keterangan/sehat', [SuperAdminController::class, 'dataketerangansehat'])->name('superadmin.dataketerangansehat');
    Route::get('/keterangan/sehat', [SuperAdminController::class, 'keterangansehat'])->name('superadmin.keterangansehat');
    Route::post('/keterangan/sehat', [SuperAdminController::class, 'addketerangansehat'])->name('superadmin.addketerangansehat');
    Route::get('/ubah/keterangan/sehat/{id}', [SuperAdminController::class, 'ubahketerangansehat'])->name('superadmin.ubahketerangansehat');
    Route::post('/ubah/keterangan/sehat/{id}', [SuperAdminController::class, 'changeketerangansehat'])->name('superadmin.changeketerangansehat');
    Route::get('/print/keterangan/sehat/{id}', [SuperAdminController::class, 'printketerangansehat'])->name('superadmin.printketerangansehat');

    Route::get('/persetujuan/tindakan/medis', [SuperAdminController::class, 'persetujuantindakanmedis'])->name('superadmin.persetujuantindakanmedis');
    Route::post('/persetujuan/tindakan/medis', [SuperAdminController::class, 'addpersetujuantindakanmedis'])->name('superadmin.addpersetujuantindakanmedis');
    Route::get('/ubah/persetujuan/tindakan/medis/{id}', [SuperAdminController::class, 'ubahpersetujuantindakanmedis'])->name('superadmin.ubahpersetujuantindakanmedis');
    Route::post('/ubah/persetujuan/tindakan/medis/{id}', [SuperAdminController::class, 'changepersetujuantindakanmedis'])->name('superadmin.changepersetujuantindakanmedis');
    Route::get('/data/tindakan/medis', [SuperAdminController::class, 'datatindakanmedis'])->name('superadmin.datatindakanmedis');
    Route::get('/print/persetujuan/tindakan/medis/{id}', [SuperAdminController::class, 'printpersetujuantindakan'])->name('superadmin.printpersetujuantindakan');

    Route::get('/pemeriksaan/antigen', [PemeriksaanAntigenController::class, 'pemeriksaanantigen'])->name('superadmin.pemeriksaanantigen');
    Route::get('/add/pemeriksaan/antigen', [PemeriksaanAntigenController::class, 'addpemeriksaanantigen'])->name('superadmin.addpemeriksaanantigen');
    Route::post('/add/pemeriksaan/antigen', [PemeriksaanAntigenController::class, 'tambahpemeriksaanantigen'])->name('superadmin.tambahpemeriksaanantigen');
    Route::get('/ubah/pemeriksaan/antigen/{id}', [PemeriksaanAntigenController::class, 'ubahpemeriksaanantigen'])->name('superadmin.ubahpemeriksaanantigen');
    Route::post('/ubah/pemeriksaan/antigen/{id}', [PemeriksaanAntigenController::class, 'changepemeriksaanantigen'])->name('superadmin.changepemeriksaanantigen');

    Route::get('/data/pasien', [SuperAdminController::class, 'datapasien'])->name('superadmin.datapasien');
    Route::get('/view/data/pasien/{id}', [SuperAdminController::class, 'viewdatapasien'])->name('superadmin.viewdatapasien');
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
    Route::get('/view/mitra/kerja/{id}', [SuperAdminController::class, 'viewmitrakerja'])->name('superadmin.viewmitrakerja');
    Route::get('/ubah/mitra/kerja/{id}', [SuperAdminController::class, 'ubahmitrakerja'])->name('superadmin.ubahmitrakerja');
    Route::post('/ubah/mitra/kerja/{id}', [SuperAdminController::class, 'changemitrakerja'])->name('superadmin.changemitrakerja');

    Route::get('/data/produk', [ProdukController::class, 'dataproduk'])->name('obat.dataproduk');
    Route::get('/add/produk', [ProdukController::class, 'addproduk'])->name('obat.addproduk');
    Route::post('/add/produk', [ProdukController::class, 'tambahproduk'])->name('obat.tambahproduk');
    Route::get('/ubah/produk/{id}', [ProdukController::class, 'ubahproduk'])->name('obat.ubahproduk');
    Route::post('/ubah/produk/{id}', [ProdukController::class, 'changeproduk'])->name('obat.changeproduk');

    Route::get('/data/alkes', [AlkesController::class, 'dataalkes'])->name('obat.dataalkes');
    Route::get('/add/alkes', [AlkesController::class, 'addalkes'])->name('obat.addalkes');
    Route::post('/add/alkes', [AlkesController::class, 'tambahalkes'])->name('obat.tambahalkes');
    Route::get('/ubah/alkes/{id}', [AlkesController::class, 'ubahalkes'])->name('obat.ubahalkes');
    Route::post('/ubah/alkes/{id}', [AlkesController::class, 'changealkes'])->name('obat.changealkes');
    Route::get('/modal/alkes/{id}', [AlkesController::class, 'modalDetail']);

    Route::get('/nama/alkes', [AlkesController::class, 'namaalkes'])->name('obat.namaalkes');
    Route::get('/add/nama/alkes', [AlkesController::class, 'addnamaalkes'])->name('obat.addnamaalkes');
    Route::post('/add/nama/alkes', [AlkesController::class, 'tambahnamaalkes'])->name('obat.tambahnamaalkes');
    Route::get('/ubah/nama/alkes/{id}', [AlkesController::class, 'ubahnamaalkes'])->name('obat.ubahnamaalkes');
    Route::post('/ubah/nama/alkes/{id}', [AlkesController::class, 'changenamaalkes'])->name('obat.changenamaalkes');

    Route::get('/golongan/alkes', [AlkesController::class, 'golonganalkes'])->name('obat.golonganalkes');
    Route::get('/add/golongan/alkes', [AlkesController::class, 'addgolonganalkes'])->name('obat.addgolonganalkes');
    Route::post('/add/golongan/alkes', [AlkesController::class, 'tambahgolonganalkes'])->name('obat.tambahgolonganalkes');
    Route::get('/ubah/golongan/alkes/{id}', [AlkesController::class, 'ubahgolonganalkes'])->name('obat.ubahgolonganalkes');
    Route::post('/ubah/golongan/alkes/{id}', [AlkesController::class, 'changegolonganalkes'])->name('obat.changegolonganalkes');

    Route::get('/data/obats', [ObatController::class, 'dataobats'])->name('obat.dataobats');
    Route::get('/add/obats', [ObatController::class, 'addobats'])->name('obat.addobats');
    Route::post('/add/obats', [ObatController::class, 'tambahobats'])->name('obat.tambahobats');
    Route::get('/ubah/obats/{id}', [ObatController::class, 'ubahobats'])->name('obat.ubahobats');
    Route::post('/ubah/obats/{id}', [ObatController::class, 'changeobats'])->name('obat.changeobats');
    Route::get('/modal/obat/{id}', [ObatController::class, 'modalObat']);

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

    Route::get('/view/user/{id}', [SuperAdminController::class, 'viewuser'])->name('superadmin.viewuser');
    Route::get('/data/user', [SuperAdminController::class, 'datauser'])->name('superadmin.datauser');
    Route::get('/add/data/user', [SuperAdminController::class, 'adduser'])->name('superadmin.adddatauser');
    Route::post('/add/data/user', [SuperAdminController::class, 'tambahuser'])->name('superadmin.tambahdatauser');
    Route::get('/ubah/data/user/{id}', [SuperAdminController::class, 'ubahuser'])->name('superadmin.ubahdatauser');
    Route::post('/ubah/data/user/{id}', [SuperAdminController::class, 'changeuser'])->name('superadmin.changedatauser');
    Route::post('/ubah-jadwal/{id}', [JadwalController::class, 'ubahJadwal']);

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

    Route::get('/mcu', [McuController::class, 'index']);
    Route::get('/mcu/{id}', [McuController::class, 'detailMcuAwal']);
    Route::get('/add_mcu/awal', [McuController::class, 'halamanTambahMcuAwal']);
    Route::get('/ubah_mcu/awal/{id}', [McuController::class, 'halamanUbahMcuAwal']);
    Route::post('/ubah_mcu/awal/{id}', [McuController::class, 'ubahMcuAwal']);

    Route::get('/add_mcu/lanjutan', [McuController::class, 'halamanTambahMcuLanjutan']);
    Route::post('/add_mcu/lanjutan', [McuController::class, 'tambahMcuLanjutan']);
    Route::get('/mcu/lanjutan/{id}', [McuController::class, 'detailMcuLanjutan']);
    Route::get('/ubah_mcu/lanjutan/{id}', [McuController::class, 'halamanUbahMcuLanjutan']);
    Route::post('/ubah_mcu/lanjutan/{id}', [McuController::class, 'ubahMcuLanjutan']);

    //surat
    Route::get('/print/keterangan-berobat/{id}', [SuratController::class, 'modalKeteranganBerobat']);
    Route::get('/modal/mcu-awal/{id}', [SuratController::class, 'modalMcuAwal']);
    Route::get('/print/mcu-awal/{id}', [SuratController::class, 'printMcuAwal']);
    Route::get('/print/izin-berobat/{id}', [SuratController::class, 'printizinBerobat']);
    Route::get('/print/rujukan/{id}', [SuratController::class, 'printRujukan']);
    Route::get('/print/sehat/{id}', [SuratController::class, 'printSehat']);
    Route::get('/print/tindakan/{id}', [SuratController::class, 'printTindakan']);
    Route::get('/print/istirahat/{id}', [SuratController::class, 'printIstirahat']);
});

Route::group(['middleware' => ['auth', 'checkRole:perawat']], function () {
    Route::get('/perawat/daftar', [PerawatController::class, 'daftar'])->name('perawat.daftar');
});
