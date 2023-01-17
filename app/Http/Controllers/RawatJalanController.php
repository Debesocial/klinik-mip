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
use App\Models\IzinBerobat;
use App\Models\Jabatan;
use App\Models\KategoriPasien;
use App\Models\KeteranganBerobat;
use App\Models\KeteranganSehat;
use App\Models\KlasifikasiPenyakit;
use App\Models\Level;
use App\Models\NamaPenyakit;
use App\Models\PemantauanCovid;
use App\Models\PemeriksaanAntigen;
use App\Models\PemeriksaanCovid;
use App\Models\PersetujuanTindakan;
use App\Models\Perusahaan;
use App\Models\RawatInap;
use App\Models\RawatJalan;
use App\Models\RekamMedis;
use App\Models\RumahSakitRujukan;
use App\Models\SpesialisRujukan;
use App\Models\SubKlasifikasi;
use App\Models\SuratRujukan;
use App\Models\TestUrin;
use App\Models\Tindakan;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use PDF;
use Response;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class RawatJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftarrawatjalan()
    {
        $rawat_jalan = RawatJalan::get();

        return view('petugas.rawatjalan.daftar_rawat_jalan', compact('rawat_jalan'));
    }

    public function addrawatjalan()
    {
        $pasien_id = Pasien::get();
        $nama_penyakit = NamaPenyakit::get();
        $tindakan = Tindakan::get();

        return view('petugas.rawatjalan.add_rawat_jalan', compact('pasien_id', 'nama_penyakit', 'tindakan'));
    }

    public function tambahrawatjalan(Request $request)
    {

        $validatedData = $request->validate([
            'pasien_id' => 'required',
            'tanggal_berobat' => 'required',
            'nama_penyakit_id' => 'required',
            'tindakan_id' => 'required',
            
        ]);

        RawatJalan::create([
            'pasien_id' => $request->pasien_id,
            'tanggal_berobat' => $request->tanggal_berobat,
            'nama_penyakit_id' => $request->nama_penyakit_id,
            'tindakan_id' => $request->tindakan_id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return redirect('/daftar/rawat/jalan')->with('message', 'Berhasil Menambahkan Data Rawat Jalan');
    }

    public function viewrawatjalan($id)
    {
        $pasien = Pasien::find($id);
        $rawat_jalan = RawatJalan::find($id);

        return view('petugas.rawatjalan.view_rawat_jalan', compact('pasien', 'rawat_jalan'));
    }

    public function ubahrawatjalan($id)
    {
        $rawat_jalan = RawatJalan::find($id);
        $namapenyakit = NamaPenyakit::all();
        $tindakan = Tindakan::all();

        return view('petugas.rawatjalan.ubah_rawat_jalan', compact('rawat_jalan', 'namapenyakit', 'tindakan'));
    }

    function changerawatjalan(Request $request, $id) {
        
        $rawat_jalan = RawatJalan::find($id);
        $rawat_jalan->tanggal_berobat = $request->input('tanggal_berobat');
        $rawat_jalan->nama_penyakit_id = $request->input('nama_penyakit_id');
        $rawat_jalan->tindakan_id = $request->input('tindakan_id');
        $rawat_jalan->update();

        return redirect('/daftar/rawat/jalan')->with('message', 'Berhasil mengubah data rawat jalan');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
