<?php

namespace App\Http\Controllers;

use App\Models\Alkes;
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
use App\Models\KlasifikasiPenyakit;
use App\Models\Level;
use App\Models\NamaPenyakit;
use App\Models\Obat;
use App\Models\PemantauanCovid;
use App\Models\PemeriksaanAntigen;
use App\Models\PemeriksaanCovid;
use App\Models\Perusahaan;
use App\Models\Produk;
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

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataobats()
    {
        $obat = Obat::all();

        return view('petugas.obat.data_obats', compact('obat'));
    }

    public function addobats()
    {
        $bobotobat = BobotObat::all();
        $golonganobat = GolonganObat::all();
        $namaobat = NamaObat::all();
        $satuanobat = SatuanObat::all();

        return view('petugas.obat.add_obats', compact('bobotobat', 'golonganobat', 'namaobat', 'satuanobat'));
    }

    public function tambahobats(Request $request)
    {

        $validatedData = $request->validate([
            'golongan_obat_id' => 'required',
            'nama_obat_id' => 'required',
            'bobot_obat_id' => 'required',
            'satuan_obat_id' => 'required',
            'komposisi_obat' => 'required'
        ]);

        Obat::create([
            'golongan_obat_id' => $request->golongan_obat_id,
            'nama_obat_id' => $request->nama_obat_id,
            'bobot_obat_id' => $request->bobot_obat_id,
            'satuan_obat_id' => $request->satuan_obat_id,
            'komposisi_obat' => $request->komposisi_obat,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return redirect('/data/obats')->with('message', 'Berhasil Menambahkan Data Obat');
    }

    public function ubahobats($id)
    {

        $obat = Obat::find($id);
        $bobotobat = BobotObat::all();
        $golonganobat = GolonganObat::all();
        $namaobat = NamaObat::all();
        $satuanobat = SatuanObat::all();
        return view('petugas.obat.ubah_obats', compact('obat', 'bobotobat', 'golonganobat', 'namaobat', 'satuanobat'));
    }

    function changeobats(Request $request, $id) {
        $obat = Obat::find($id);
        $obat->golongan_obat_id = $request->input('golongan_obat_id');
        $obat->nama_obat_id = $request->input('nama_obat_id');
        $obat->satuan_obat_id = $request->input('satuan_obat_id');
        $obat->bobot_obat_id = $request->input('bobot_obat_id');
        $obat->komposisi_obat = $request->input('komposisi_obat');
        $obat->update();

        return redirect('/data/obats')->with('message', 'Berhasil Mengubah Data Obat!');
    }

   
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    

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
