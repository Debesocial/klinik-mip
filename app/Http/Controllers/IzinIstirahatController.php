<?php

namespace App\Http\Controllers;

use App\Models\Alkes;
use Illuminate\Http\Request;

use App\Models\IzinIstirahat;
use App\Models\NamaPenyakit;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\RumahSakitRujukan;
use App\Models\SatuanObat;
use App\Models\SpesialisRujukan;
use App\Models\Tindakan;

class IzinIstirahatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataizinistirahat()
    {
        $izinistirahat = IzinIstirahat::all();


        return view('petugas.istirahat.data_izin_istirahat', compact('izinistirahat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pasien_id'] = Pasien::with('kategori', 'perusahaan', 'divisi', 'jabatan')->where('id_rekam_medis', '!=', 'null')->get();
        $data['rsrujukan'] = RumahSakitRujukan::all();
        $data['spesialisrujukan'] = SpesialisRujukan::all();
        $data['nama_penyakit'] = NamaPenyakit::with(['sub_klasifikasi', 'sub_klasifikasi.klasifikasi_penyakit'])->get();
        $data['alatkesehatan'] = Alkes::where('golongan_alkes_id','!=',5)->get();
        $data['obat'] = Obat::get();
        $data['satuanobat'] = SatuanObat::get();
        $data['tindakan'] = Tindakan::get();

        return view('petugas.superadmin.rev.new_izin_istirahat', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;
        if (IzinIstirahat::create($data)) {
            return redirect("/data/izin/istirahat")->with('message', 'Berhasil Menambahkan Izin Istirahat!');
        }
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
        $data['istirahat'] = IzinIstirahat::with(['pasien.kategori', 'pasien.perusahaan', 'pasien.divisi', 'pasien.jabatan'])->find($id);
        $data['rsrujukan'] = RumahSakitRujukan::all();
        $data['spesialisrujukan'] = SpesialisRujukan::all();
        $data['nama_penyakit'] = NamaPenyakit::with(['sub_klasifikasi', 'sub_klasifikasi.klasifikasi_penyakit'])->get();
        $data['alatkesehatan'] = Alkes::where('golongan_alkes_id','!=',5)->get();
        $data['obat'] = Obat::get();
        $data['satuanobat'] = SatuanObat::get();
        $data['tindakan'] = Tindakan::get();

        return view('petugas.superadmin.rev.new_ubah_izin_istirahat', $data);

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
        
        $data = $request->except('_token');
        $data['updated_by'] = auth()->user()->id;
        if (IzinIstirahat::where('id', $id)->update($data)) {
            return redirect("/data/izin/istirahat")->with('message', 'Berhasil Mengubah Izin Istirahat!');
        }
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
