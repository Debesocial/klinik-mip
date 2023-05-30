<?php

namespace App\Http\Controllers;

use App\Models\Alkes;
use App\Models\KlasifikasiPenyakit;
use App\Models\NamaAlkes;
use App\Models\Pasien;

use App\Models\NamaPenyakit;
use App\Models\Obat;
use App\Models\RawatJalan;
use App\Models\SatuanObat;
use App\Models\SubKlasifikasi;
use App\Models\Tindakan;
use Illuminate\Support\Facades\File;


use Illuminate\Http\Request;


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
        $klasifikasi = KlasifikasiPenyakit::get();
        $subKlasifikasi = SubKlasifikasi::get();
        $alatkesehatan = Alkes::get();
        $satuanobat = SatuanObat::get();
        $obat = Obat::get();

        return view('petugas.rawatjalan.add_rawat_jalan', compact('pasien_id', 'obat', 'nama_penyakit', 'klasifikasi', 'subKlasifikasi', 'alatkesehatan', 'satuanobat'));
    }

    public function tambahrawatjalan(Request $request)
    {

        $data = $request->except('_token');
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('pemeriksaan/rawatjalan', $filename);
        } else {
            $filename = '';
        }

        $data['dokumen'] = $filename;
        $data['nama_penyakit_id'] = json_encode($request->nama_penyakit_id);
        $save = RawatJalan::create($data);
        if ($save) {
            return redirect("/view/rawat/jalan/$save->id")->with('message', 'Berhasil Menambah Pasien Rawat Jalan');
        }

    }

    public function viewrawatjalan($id)
    {
        $data['jalan'] = RawatJalan::find($id);
        $data['alkes'] = Alkes::all();
        $data['nama_penyakit'] = NamaPenyakit::all();
        $data['obat'] = Obat::get();

        return view('petugas.rawatjalan.view_rawat_jalan', $data);
    }

    public function ubahrawatjalan($id)
    {
        $rawat_jalan = RawatJalan::find($id);
        $nama_penyakit = NamaPenyakit::get();
        $klasifikasi = KlasifikasiPenyakit::get();
        $subKlasifikasi = SubKlasifikasi::get();
        $alatkesehatan = Alkes::get();
        $satuanobat = SatuanObat::get();
        $obat = Obat::get();

        return view('petugas.rawatjalan.ubah_rawat_jalan', compact('rawat_jalan', 'obat', 'nama_penyakit', 'klasifikasi', 'subKlasifikasi', 'alatkesehatan', 'satuanobat'));
    }

    function changerawatjalan(Request $request, $id) {
        
        $data = $request->except(['_token','old_dokumen']);
        $data['updated_by'] = auth()->user()->id;

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();  
            $file->move('pemeriksaan/rawatjalan', $filename);
            if ($request->old_dokumen) {
                $path = parse_url('pemeriksaan/rawatjalan/'.$request->old_dokumen);
                File::delete(public_path($path['path']));
            }
            $data['dokumen']=$filename;
        }
        if (RawatJalan::where('id',$id)->update($data)) {
            return redirect("/view/rawat/jalan/" . $id)->with('message', 'Berhasil Merubah Data Pasien Rawat Jalan!');
        }
        
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
