<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Pasien;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Keluarga;
use App\Models\LokasiKejadian;
use App\Models\BobotObat;
use App\Models\GolonganObat;
use App\Models\JenisObat;
use App\Models\NamaObat;
use App\Models\ObatAlkes;
use App\Models\SatuanObat;
use App\Models\HasilPemantauan;
use App\Models\Jabatan;
use App\Models\KategoriPasien;
use App\Models\Level;
use App\Models\NamaPenyakit;
use App\Models\Perusahaan;
use App\Models\RumahSakitRujukan;
use App\Models\SpesialisRujukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pemeriksaannarkoba()
    {
        $pasien = Pasien::all();
        return view('petugas.superadmin.pemeriksaan_narkoba')->with('pasien', $pasien);
    }

    public function pemeriksaancovid()
    {
        return view('petugas.superadmin.pemeriksaan_covid');
    }

    public function pemantauancovid()
    {
        return view('petugas.superadmin.pemantauan_covid');
    }

    public function rawatinapdokter()
    {
        return view('petugas.superadmin.rawat_inap_dokter');
    }

    public function rawatinapperawat()
    {
        return view('petugas.superadmin.rawat_inap_perawat');
    }

    public function permintaanmakanan()
    {
        return view('petugas.superadmin.permintaan_makanan');
    }

    public function kecelakaankerja()
    {
        return view('petugas.superadmin.kecelakaan_kerja');
    }

    public function keteranganberobat()
    {
        return view('petugas.superadmin.keterangan_berobat');
    }

    public function izinberobat()
    {
        $users = User::all();
        return view('petugas.superadmin.izin_berobat', compact( 'users'));
    }

    public function proses()
    {
        include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "select * from users where id='$id'");
$users = mysqli_fetch_array($query);
$data = array(
            'email'      =>  $mahasiswa['email'],
            'telp'   =>  $mahasiswa['telp'],
            'status'    =>  $mahasiswa['status'],);
 echo json_encode($data);
        return view('petugas.superadmin.proses');
    }

    public function izinistirahat()
    {
        return view('petugas.superadmin.izin_istirahat');
    }

    public function suratrujukan()
    {
        return view('petugas.superadmin.surat_rujukan');
    }

    public function keterangansehat()
    {
        return view('petugas.superadmin.keterangan_sehat');
    }

    public function persetujuantindakanmedis()
    {
        return view('petugas.superadmin.persetujuan_tindakan_medis');
    }

    public function dataobat()
    {
        $obatalkes = ObatAlkes::all();
        
        return view('petugas.superadmin.data_obat', compact('obatalkes'));
    }

    public function addobat()
    {
        $bobotobat = BobotObat::all();
        $golonganobat = GolonganObat::all();
        $jenisobat = JenisObat::all();
        $namaobat = NamaObat::all();
        $satuanobat = SatuanObat::all();

        return view('petugas.superadmin.add_data_obat', compact('bobotobat', 'golonganobat', 'jenisobat', 'namaobat', 'satuanobat'));
    }

    public function tambahobat(Request $request)
    {
        
        $validatedData = $request->validate([
            'jenis_obat_id' => 'required',
            'golongan_obat_id' => 'required',
            'nama_obat_id' => 'required',
            'bobot_obat_id' => 'required',
            'satuan_obat_id' => 'required',
            'komposisi_obat' => 'required'
        ]);

        ObatAlkes::create([
            'jenis_obat_id' => $request->jenis_obat_id,
            'golongan_obat_id' => $request->golongan_obat_id,
            'nama_obat_id' => $request->nama_obat_id,
            'bobot_obat_id' => $request->bobot_obat_id,
            'satuan_obat_id' => $request->satuan_obat_id,
            'komposisi_obat' => $request->komposisi_obat,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return redirect('/data/obat')->with('success', 'Successfully!');
    }

    public function ubahobat($id)
    {
        
        $obatalkes = ObatAlkes::find($id);
        $bobotobat = BobotObat::all();
        $golonganobat = GolonganObat::all();
        $jenisobat = JenisObat::all();
        $namaobat = NamaObat::all();
        $satuanobat = SatuanObat::all();
        return view('petugas.superadmin.ubah_data_obat', compact('obatalkes', 'bobotobat', 'golonganobat', 'jenisobat', 'namaobat', 'satuanobat')); 
    }

    function changeobat(Request $request, $id) {
        $obatalkes = ObatAlkes::find($id);
        $obatalkes->jenis_obat_id = $request->input('jenis_obat_id');
        $obatalkes->golongan_obat_id = $request->input('golongan_obat_id');
        $obatalkes->nama_obat_id = $request->input('nama_obat_id');
        $obatalkes->satuan_obat_id = $request->input('satuan_obat_id');
        $obatalkes->bobot_obat_id = $request->input('bobot_obat_id');
        $obatalkes->komposisi_obat = $request->input('komposisi_obat');
        $obatalkes->update();

        return redirect('/data/obat')->with('success', 'Successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datapasien()
    {
        $pasien = Pasien::all();
        return view('petugas.superadmin.data_pasien')->with('pasiens', $pasien);
    }
    public function addpasien()
    {
        $pasien = Pasien::all();
        $kategori = KategoriPasien::all();
        $perusahaan = Perusahaan::all();
        $divisi = Divisi::all();
        $jabatan = Jabatan::all();
        $namapenyakit = NamaPenyakit::all();

        return view('petugas.superadmin.add_data_pasien', compact('kategori', 'perusahaan', 'divisi', 'jabatan',  'pasien', 'namapenyakit'));
    }
    public function tambahpasien(Request $request)
    {
        $request->validate([
            'kategori_pasien' => 'required',
            'NIK' => 'required',
            'perusahaan' => 'required',
            'divisi' => 'required',
            'jabatan' => 'required',
            'nama_pasien' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'alamat_mess' => 'required',
            'pekerjaan' => 'required',
            'nama_penyakit' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'alergi' => 'required',
            'hamil_menyusui' => 'required',
            'nama_keluarga' => 'required',
            'hubungan' => 'required',
            'alamat_keluarga' => 'required',
            'pekerjaan_keluarga' => 'required',
            'telepon_keluarga' => 'required',
            'email_keluarga' => 'required'
        ]);

        $keluarga = Keluarga::create([
            'nama' => $request->nama_keluarga,
            'hubungan' => $request->hubungan,
            'alamat' => $request->alamat_keluarga,
            'pekerjaan' => $request->pekerjaan_keluarga,
            'telepon' => $request->telepon_keluarga,
            'email' => $request->email_keluarga,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        $pasien = Pasien::create([
            'kategori_pasien_id' => $request->kategori_pasien,
            'NIK' => $request->NIK,
            'perusahaan_id' => $request->perusahaan,
            'divisi_id' => $request->divisi,
            'jabatan_id' => $request->jabatan,
            'keluarga_id' => $keluarga->id,
            'nama_pasien' => $request->nama_pasien,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'alamat_mess' => $request->alamat_mess,
            'pekerjaan' => $request->pekerjaan,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'nama_penyakit_id' => $request->nama_penyakit,
            'alergi_obat' => $request->alergi,
            'hamil_menyusui' => $request->hamil_menyusui,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        if ($pasien) {
            return redirect('/data/pasien')->with('success', 'Successfully!');
        }

        return redirect()->back()->with('fail', 'Fail Create Data!');
    }

    public function ubahpasien($id)
    {
        
        $pasien = Pasien::find($id);
        $kategori = KategoriPasien::all();
        $perusahaan = Perusahaan::all();
        $divisi = Divisi::all();
        $jabatan = Jabatan::all();
        $keluarga = Keluarga::all();

        return view('petugas.superadmin.ubah_data_pasien', compact('pasien', 'kategori', 'perusahaan', 'divisi', 'jabatan', 'keluarga')); 
    }

    function changepasien(Request $request, $id) {
        $pasien = Pasien::find($id);
        $pasien->kategori_pasien_id = $request->input('kategori_pasien');
        $pasien->NIK = $request->input('NIK');
        $pasien->perusahaan_id = $request->input('perusahaan');
        $pasien->divisi_id = $request->input('divisi');
        $pasien->jabatan_id = $request->input('jabatan');
        $pasien->keluarga_id = $request->input('keluarga');
        $pasien->nama_pasien = $request->input('nama_pasien');
        $pasien->tempat_lahir = $request->input('tempat_lahir');
        $pasien->tanggal_lahir = $request->input('tanggal_lahir');
        $pasien->umur = $request->input('umur');
        $pasien->jenis_kelamin = $request->input('jenis_kelamin');
        $pasien->alamat = $request->input('alamat');
        $pasien->pekerjaan = $request->input('pekerjaan');
        $pasien->telepon = $request->input('telepon');
        $pasien->email = $request->input('email');
        $pasien->alergi_obat = $request->input('alergi');
        $pasien->hamil_menyusui = $request->input('hamil_menyusui');
        $pasien->keluarga_id = $request->input('keluarga_id');
        $pasien->update();

        return redirect('/data/pasien')->with('success', 'Successfully!');
    }

    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datauser()
    {
        $users = User::all();
        
        
        return view('petugas.superadmin.data_user')->with('users', $users);
    }

    public function adduser()
    {
        $jadwal = Jadwal::all();
        $level = Level::all();

        return view('petugas.superadmin.add_data_user', compact('jadwal', 'level'));
    }

    public function tambahuser(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'status' => 'required',
            'jadwal_id' => 'required',
            'telp' => 'required',
            'level_id' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/data/user')->with('success', 'Successfully!');
    }

    public function ubahuser($id)
    {
        $user = User::find($id);
        $jadwal = Jadwal::all();
        $level = Level::all();
        return view('petugas.superadmin.ubah_data_user', compact('user', 'jadwal', 'level')); 
    }

    function changeuser(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->jadwal_id = $request->input('jadwal_id');
        $user->telp = $request->input('telp');
        $user->level_id = $request->input('level_id');
        $user->update();

        return redirect('/data/user')->with('success', 'Successfully!');
    }

    public function jadwal()
    {
        $jadwal = Jadwal::all();
        return view('petugas.superadmin.jadwal')->with('jadwal', $jadwal);
    }

    public function addjadwal()
    {
        return view('petugas.superadmin.add_jadwal');
    }

    public function tambahjadwal(Request $request)
    {
        $validatedData = $request->validate([
            'hari' => 'required',
            'shift' => 'required',
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        Jadwal::create([
            'hari' => $request->hari,
            'shift' => $request->shift,
            'dari' => $request->dari,
            'sampai' => $request->sampai,
        ]);

        return redirect('/jadwal')->with('success', 'Successfully!');
    }

    public function ubahjadwal($id)
    {
        $jadwal = Jadwal::find($id);
        
        return view('petugas.superadmin.ubah_jadwal', compact('jadwal'));
    }

    function changejadwal(Request $request, $id) {
        $jadwal = Jadwal::find($id);
        $jadwal->hari = $request->input('hari');
        $jadwal->shift = $request->input('shift');
        $jadwal->dari = $request->input('dari');
        $jadwal->sampai = $request->input('sampai');
        $jadwal->update();

        return redirect('/jadwal')->with('success', 'Successfully!');
    }

    public function lokasikejadian()
    {
        $lokasikejadian = LokasiKejadian::all();
        return view('petugas.superadmin.lokasi_kejadian')->with('lokasi_kejadians', $lokasikejadian);
    }

    public function addlokasikejadian()
    {
        return view('petugas.superadmin.add_lokasi_kejadian');
    }

    public function tambahlokasikejadian(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lokasi' => 'required'
        ]);

        LokasiKejadian::create([
            'nama_lokasi' => $request->nama_lokasi,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/lokasi/kejadian')->with('success', 'Successfully!');
    }

    public function ubahlokasikejadian($id)
    {
        $lokasikejadian = LokasiKejadian::find($id);
        return view('petugas.superadmin.ubah_lokasi_kejadian', compact('lokasikejadian')); 
    }

    function changelokasikejadian(Request $request, $id) {
        $lokasikejadian = LokasiKejadian::find($id);
        $lokasikejadian->nama_lokasi = $request->input('nama_lokasi');
        $lokasikejadian->update();

        return redirect('/lokasi/kejadian')->with('success', 'Successfully!');
    }

    public function rsrujukan()
    {
        $rsrujukan = RumahSakitRujukan::all();
        return view('petugas.superadmin.rs_rujukan')->with('rumah_sakit_rujukans', $rsrujukan);
    }

    public function addrsrujukan()
    {
        return view('petugas.superadmin.add_rs_rujukan');
    }

    public function tambahrsrujukan(Request $request)
    {
        $validatedData = $request->validate([
            'nama_RS_rujukan' => 'required',
        ]);
        
        RumahSakitRujukan::create([
            'nama_RS_rujukan' => $request->nama_RS_rujukan,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/rs/rujukan')->with('success', 'Successfully!');
    }

    public function ubahrsrujukan($id)
    {
        $rsrujukan = RumahSakitRujukan::find($id);
        return view('petugas.superadmin.ubah_rs_rujukan', compact('rsrujukan')); 
    }

    function changersrujukan(Request $request, $id) {
        $rsrujukan = RumahSakitRujukan::find($id);
        $rsrujukan->nama_RS_rujukan = $request->input('nama_RS_rujukan');
        $rsrujukan->update();

        return redirect('/rs/rujukan')->with('success', 'Successfully!');
    }

    public function spesialisrujukan()
    {
        $spesialisrujukan = SpesialisRujukan::all();
        return view('petugas.superadmin.spesialis_rujukan')->with('spesialis_rujukans', $spesialisrujukan);
    }

    public function addspesialisrujukan()
    {
        return view('petugas.superadmin.add_spesialis_rujukan');
    }

    public function tambahspessialisrujukan(Request $request)
    {
        $validatedData = $request->validate([
            'nama_spesialis_rujukan' => 'required'
        ]);

        SpesialisRujukan::create([
            'nama_spesialis_rujukan' => $request->nama_spesialis_rujukan,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/spesialis/rujukan')->with('success', 'Successfully!');
    }

    public function hasilpemantauan()
    {
        $hasilpemantauan = HasilPemantauan::all();
        return view('petugas.superadmin.hasil_pemantauan')->with('hasil_pemantauans', $hasilpemantauan);
    }

    public function ubahspesialisrujukan($id)
    {
        $spesialisrujukan = SpesialisRujukan::find($id);
        return view('petugas.superadmin.ubah_spesialis_rujukan', compact('spesialisrujukan')); 
    }

    function changespesialisrujukan(Request $request, $id) {
        $spesialisrujukan = SpesialisRujukan::find($id);
        $spesialisrujukan->nama_spesialis_rujukan = $request->input('nama_spesialis_rujukan');
        $spesialisrujukan->update();

        return redirect('/spesialis/rujukan')->with('success', 'Successfully!');
    }

    public function addhasilpemantauan()
    {
        return view('petugas.superadmin.add_hasil_pemantauan');
    }

    public function tambahhasilpemantauan(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama_pemantauan' => 'required'
        ]);

        HasilPemantauan::create([
            'kode' => $request->kode,
            'nama_pemantauan' => $request->nama_pemantauan,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/hasil/pemantauan')->with('success', 'Successfully!');
    }

    public function ubahhasilpemantauan($id)
    {
        $hasilpemantauan = HasilPemantauan::find($id);
        return view('petugas.superadmin.ubah_hasil_pemantauan', compact('hasilpemantauan')); 
    }

    function changehasilpemantauan(Request $request, $id) {
        $hasilpemantauan = HasilPemantauan::find($id);
        $hasilpemantauan->kode = $request->input('kode');
        $hasilpemantauan->nama_pemantauan = $request->input('nama_pemantauan');
        $hasilpemantauan->update();

        return redirect('/hasil/pemantauan')->with('success', 'Successfully!');
    }

    public function addkeluarga($id)
    {
        $keluarga = Keluarga::find($id);
        return view('petugas.superadmin.add_data_keluarga', compact('keluarga')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
