<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Models\Level;
use App\Models\NamaPenyakit;
use App\Models\PemantauanCovid;
use App\Models\PemeriksaanAntigen;
use App\Models\PemeriksaanCovid;
use App\Models\Perusahaan;
use App\Models\RekamMedis;
use App\Models\RumahSakitRujukan;
use App\Models\SpesialisRujukan;
use App\Models\SuratRujukan;
use App\Models\TestUrin;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use PDF;
use Response;
use Carbon\Carbon;
use Carbon\CarbonImmutable;

class PemeriksaanCovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datapemeriksaancovid()
    {
        $covid = PemeriksaanCovid::all();
        $pemantauan = PemantauanCovid::all();


        return view('petugas.pemeriksaan.data_pemeriksaan_covid', compact('covid', 'pemantauan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewpemeriksaancovid($id)
    {
        $covid = PemeriksaanCovid::find($id);


        return view('petugas.pemeriksaan.view_pemeriksaan_covid', compact('covid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ubahpemeriksaancovid($id)
    {
        $covid = PemeriksaanCovid::find($id);
        $pemeriksaan = PemeriksaanAntigen::all();

        return view('petugas.pemeriksaan.ubah_pemeriksaan_covid', compact('covid', 'pemeriksaan'));
    }

    function changepemeriksaancovid(Request $request, $id) {
        $covid = PemeriksaanCovid::find($id);
        $covid->pemeriksaan_antigen_id = $request->input('pemeriksaan_antigen_id');
        $covid->hasil_pemeriksaan = $request->input('hasil_pemeriksaan');
        $covid->update();


        return redirect('/data/pemeriksaan/Covid')->with('success', 'Berhasil Mengubah Data Pemeriksaan Covid!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function nambahpemeriksaancovid($id)
    {
        $pasien = Pasien::find($id);
        $pemeriksaan = PemeriksaanAntigen::all();
        $covid = PemeriksaanCovid::all();


        return view('petugas.pemeriksaan.add_pemeriksaan_covid', compact('pasien', 'pemeriksaan', 'covid'));
    }

    public function tambahpemeriksaancovid(Request $request)
    {

        $validatedData = $request->validate([
            'pasien_id' => 'required',
            'pemeriksaan_antigen_id' => 'required',
            'hasil_pemeriksaan' => 'required'
        ]);

        PemeriksaanCovid::create([
            'pasien_id' => $request->pasien_id,
            'pemeriksaan_antigen_id' => $request->pemeriksaan_antigen_id,
            'hasil_pemeriksaan' => $request->hasil_pemeriksaan,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return redirect('/data/pemeriksaan/covid')->with('success', 'Berhasil Menambahkan Data Pemeriksaan Covid');
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
