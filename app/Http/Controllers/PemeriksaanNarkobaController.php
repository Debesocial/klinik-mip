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
use App\Models\Level;
use App\Models\NamaPenyakit;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class PemeriksaanNarkobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datapemeriksaannarkoba()
    {
        $narkoba = TestUrin::all();


        return view('petugas.pemeriksaan.data_pemeriksaan_narkoba', compact('narkoba'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewpemeriksaannarkoba($id)
    {
        $narkoba = TestUrin::find($id);

        return view('petugas.pemeriksaan.view_pemeriksaan_narkoba', compact('narkoba'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ubahpemeriksaannarkoba($id)
    {
        $narkoba = TestUrin::with(['pasien','pasien.perusahaan', 'pasien.divisi', 'pasien.jabatan', 'pasien.keluarga', 'pasien.kategori'])->find($id);

        return view('petugas.superadmin.rev.new_ubah_periksa_narkoba', compact('narkoba'));
    }

    function changepemeriksaannarkoba(Request $request, $id) {
        // dd($request->input('senin'));

        

        $narkoba = TestUrin::find($id);
        $narkoba->penggunaan_obat = $request->input('penggunaan_obat');
        $narkoba->tujuan_surat = $request->input('tujuan_surat');
        $narkoba->jenis_obat = $request->input('jenis_obat');
        $narkoba->asal_obat = $request->input('asal_obat');
        $narkoba->terakhir_digunakan = $request->input('terakhir_digunakan');
        $narkoba->amp = $request->input('amp');
        $narkoba->met = $request->input('met');
        $narkoba->thc = $request->input('thc');
        $narkoba->bzo = $request->input('bzo');
        $narkoba->mop = $request->input('mop');
        $narkoba->coc = $request->input('coc');
        $narkoba->soma = $request->input('soma');
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();  
            $file->move('pemeriksaan/narkoba/file', $filename);
            if ($request->old_dokumen) {
                $path = parse_url('pemeriksaan/narkoba/file/'.$request->old_dokumen);
                File::delete(public_path($path['path']));
            }
            $narkoba->dokumen=$filename;
        }
        $narkoba->update();


        return redirect('/data/pemeriksaan/narkoba')->with('message', 'Berhasil Mengubah Data Pemeriksaan Narkoba!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pemeriksaannarkotika($id)
    {
        $pasien = Pasien::find($id);
        $narkoba = TestUrin::all();

        return view('petugas.pemeriksaan.pemeriksaan_narkotika', compact('narkoba', 'pasien'));
    }

    public function addpemeriksaannarkotika(Request $request)
    {
        $validatedData = $request->validate([
            'penggunaan_obat' => 'required',
            'jenis_obat' => 'required',
            'asal_obat' => 'required',
            'terakhir_digunakan' => 'required',
            'amp' => 'required',
            'met' => 'required',
            'thc' => 'required',
            'bzo' => 'required',
            'mop' => 'required',
            'coc' => 'required',
        ]);

        if($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');

            $filename = time().'_'.$file->getClientOriginalName();
            $file->move('pemeriksaan/narkoba/file', $filename);
        }else {
            $filename = '';
        }

        TestUrin::create([
            'pasien_id' => $request->pasien_id,
            'penggunaan_obat' => $request->penggunaan_obat,
            'tujuan_surat' => $request->tujuan_surat,
            'jenis_obat' => $request->jenis_obat,
            'asal_obat' => $request->asal_obat,
            'terakhir_digunakan' => $request->terakhir_digunakan,
            'dokumen' => $filename,
            'amp' => $request->amp,
            'met' => $request->met,
            'thc' => $request->thc,
            'bzo' => $request->bzo,
            'mop' => $request->mop,
            'coc' => $request->coc,
            'soma' => $request->soma,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return redirect('/data/pemeriksaan/narkoba')->with('message', 'Berhasil Menambahkan Data Pemeriksaan Narkoba');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function printpemeriksaannarkoba($id)
    {
        $narkoba = TestUrin::find($id);
        $pasien = Pasien::all();

        $today = Carbon::now()->isoFormat('D MMMM Y');
  
        $pdf = PDF::loadView('petugas.pemeriksaan.print_pemeriksaan_narkoba', ['narkoba' => $narkoba])->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper('a4', 'portrait');
        
        $pdf->save(storage_path().'pemeriksaannarkoba.pdf');
        return $pdf->stream();
    }  //
    

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
