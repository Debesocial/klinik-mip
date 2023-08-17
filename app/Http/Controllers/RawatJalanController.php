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
        $rawat_jalan->load(['pasien', 'pasien.perusahaan', 'pasien.divisi', 'pasien.jabatan', 'pasien.keluarga', 'pasien.kategori']);


        return view('petugas.rawatjalan.daftar_rawat_jalan', compact('rawat_jalan'));
    }

    public function addrawatjalan(Request $request)
    {
        $pasien_id = Pasien::with(['perusahaan', 'divisi', 'keluarga', 'jabatan', 'kategori', 'obatAlergi'])->where('id_rekam_medis', '!=', 'null')->get();
        $nama_penyakit = NamaPenyakit::get();
        $klasifikasi = KlasifikasiPenyakit::get();
        $subKlasifikasi = SubKlasifikasi::get();
        $alatkesehatan = Alkes::where('golongan_alkes_id', '!=', 5)->with('satuan_obat')->get();
        $satuanobat = SatuanObat::get();
        $obat = Obat::get();
        $tindakan = Tindakan::get();
        $selected_pasien = $request->user;
        return view('petugas.rawatjalan.add_rawat_jalan', compact('tindakan', 'selected_pasien', 'pasien_id', 'obat', 'nama_penyakit', 'klasifikasi', 'subKlasifikasi', 'alatkesehatan', 'satuanobat'));
    }

    public function tambahrawatjalan(Request $request)
    {

        $data = $request->except('_token');
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;
        $dokumen = [];
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            foreach ($file as $val) {
                $filename = time() . '_' . $val->getClientOriginalName();
                $dokumen[] = $filename;
                $val->move('pemeriksaan/rawatjalan', $filename);
            }
        }
        if ($request->hasFile('persetujuan_tindakan')) {
            $file = $request->file('persetujuan_tindakan');
            $persetujuan = time() . '_' . $file->getClientOriginalName();
            $file->move('pemeriksaan/persetujuan_tindakan', $persetujuan);
        } else {
            $persetujuan = '';
        }

        $data['dokumen'] = json_encode($dokumen);
        $data['persetujuan_tindakan'] = $persetujuan;
        $data['nama_penyakit_id'] = json_encode($request->nama_penyakit_id);
        $save = RawatJalan::create($data);
        if ($save) {
            return redirect("/view/rawat/jalan/$save->id")->with('message', 'Berhasil Menambah Pasien Rawat Jalan');
        }
    }

    public function viewrawatjalan($id)
    {
        $data['jalan'] = RawatJalan::with(['pasien', 'pasien.perusahaan', 'pasien.divisi', 'pasien.jabatan', 'pasien.keluarga', 'pasien.kategori', 'pasien.obatAlergi'])->find($id);
        $data['alkes'] = Alkes::with('satuan_obat')->get();
        $data['nama_penyakit'] = NamaPenyakit::with(['sub_klasifikasi', 'sub_klasifikasi.klasifikasi_penyakit'])->get();
        $data['obat'] = Obat::with(['satuan_obat'])->get();
        $data['tindakan'] = Tindakan::get();


        return view('petugas.rawatjalan.view_rawat_jalan', $data);
    }

    public function ubahrawatjalan($id)
    {
        $rawat_jalan = RawatJalan::find($id);
        $rawat_jalan->load(['pasien', 'pasien.perusahaan', 'pasien.divisi', 'pasien.jabatan', 'pasien.keluarga', 'pasien.kategori', 'pasien.obatAlergi']);
        $nama_penyakit = NamaPenyakit::get();
        $klasifikasi = KlasifikasiPenyakit::get();
        $subKlasifikasi = SubKlasifikasi::get();
        $alatkesehatan = Alkes::where('golongan_alkes_id', '!=', 5)->get();
        $satuanobat = SatuanObat::get();
        $obat = Obat::get();
        $tindakan = Tindakan::get();


        return view('petugas.rawatjalan.ubah_rawat_jalan', compact('tindakan', 'rawat_jalan', 'obat', 'nama_penyakit', 'klasifikasi', 'subKlasifikasi', 'alatkesehatan', 'satuanobat'));
    }

    function changerawatjalan(Request $request, $id)
    {

        $data = $request->except(['_token', 'old_dokumen', 'old_persetujuan_tindakan']);
        $data['updated_by'] = auth()->user()->id;

        // hapus dokumen ada yang berubah
        $currDok = RawatJalan::select('dokumen')->where('id', $id)->get()[0]->dokumen;
        $currDok = json_decode($currDok);
        if ($currDok) {
            foreach ($currDok as $key) {
                //hapus yang tidak ada
                if (!in_array($key, json_decode($request->old_dokumen))) {
                    $path = parse_url('pemeriksaan/rawatjalan/' . $key);
                    File::delete(public_path($path['path']));
                }
            }
        }
        $dokumen = json_decode($request->old_dokumen);
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            foreach ($file as $val) {
                $filename = time() . '_' . $val->getClientOriginalName();
                $dokumen[] = $filename;
                $val->move('pemeriksaan/rawatjalan', $filename);
            }
        }
        $data['dokumen'] = json_encode($dokumen);
        if ($request->hasFile('persetujuan_tindakan')) {
            $file = $request->file('persetujuan_tindakan');
            $persetujuan = time() . '_' . $file->getClientOriginalName();
            $file->move('pemeriksaan/persetujuan_tindakan', $persetujuan);
            if ($request->old_persetujuan_tindakan) {
                $path = parse_url('pemeriksaan/persetujuan_tindakan/' . $request->old_persetujuan_tindakan);
                File::delete(public_path($path['path']));
            }
            $data['persetujuan_tindakan'] = $persetujuan;
        }
        if (RawatJalan::where('id', $id)->update($data)) {
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
