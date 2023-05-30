<?php

namespace App\Http\Controllers;

use App\Models\Alkes;
use App\Models\HasilPemantauan;
use App\Models\KlasifikasiPenyakit;
use App\Models\NamaAlkes;
use App\Models\NamaPenyakit;
use App\Models\Obat;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\RawatInap;
use App\Models\SatuanObat;
use App\Models\SubKlasifikasi;
use Illuminate\Support\Facades\File;

class RawatInapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewrawatinap($id)
    {
        // $pasien = Pasien::find($id);
        $rawat_inap = RawatInap::find($id);
        $nama_penyakit = NamaPenyakit::all();
        $pemantauan = HasilPemantauan::all();


        return view('petugas.rawatinap.view_rawat_inap', compact('rawat_inap', 'nama_penyakit', 'pemantauan'));
    }

    public function daftarrawatinap()
    {
        $rawat_inap = RawatInap::get();

        return view('petugas.rawatinap.daftar_rawat_inap', compact('rawat_inap'));
    }

    public function addrawatinap()
    {
        $pasien_id = Pasien::get();
        $nama_penyakit = NamaPenyakit::get();
        $klasifikasi = KlasifikasiPenyakit::get();
        $subKlasifikasi = SubKlasifikasi::get();
        $alatkesehatan = Alkes::get();
        $satuanobat = SatuanObat::get();
        $obat = Obat::get();
        return view('petugas.rawatinap.add_rawat_inap', compact('pasien_id', 'obat', 'nama_penyakit', 'klasifikasi', 'subKlasifikasi', 'alatkesehatan', 'satuanobat'));
    }

    public function tambahrawatinap(Request $request)
    {

        $data = $request->except('_token');
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('pemeriksaan/rawatinap', $filename);
        } else {
            $filename = '';
        }

        $data['dokumen'] = $filename;
        $data['nama_penyakit_id'] = json_encode($request->nama_penyakit_id);
        $save = RawatInap::create($data);
        if ($save) {
            return redirect("/view/rawat/inap/$save->id")->with('message', 'Berhasil Menambah Pasien Rawat Inap');
        }

    }

    public function ubahrawatinap($id)
    {
        $rawat_inap = RawatInap::find($id);
        $nama_penyakit = NamaPenyakit::get();
        $klasifikasi = KlasifikasiPenyakit::get();
        $subKlasifikasi = SubKlasifikasi::get();
        $alatkesehatan = Alkes::get();
        $satuanobat = SatuanObat::get();
        $obat = Obat::get();

        return view('petugas.rawatinap.ubah_rawat_inap', compact('rawat_inap', 'nama_penyakit', 'subKlasifikasi',
        'klasifikasi','alatkesehatan', 'satuanobat', 'obat'));
    }

    function changerawatinap(Request $request, $id) {
        
        $data = $request->except(['_token','old_dokumen']);
        $data['updated_by'] = auth()->user()->id;

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();  
            $file->move('pemeriksaan/rawatinap', $filename);
            if ($request->old_dokumen) {
                $path = parse_url('pemeriksaan/rawatinap/'.$request->old_dokumen);
                File::delete(public_path($path['path']));
            }
            $data['dokumen']=$filename;
        }
        if (RawatInap::where('id',$id)->update($data)) {
            return redirect("/view/rawat/inap/" . $id)->with('message', 'Berhasil Merubah Data Pasien Rawat Inap!');
        }
        
    }

    public function detail($id)
    {
        $data['inap'] = RawatInap::find($id);
        $data['alkes'] = Alkes::all();
        $data['satuanobat'] = SatuanObat::all();
        $data['obat'] = Obat::all();

        return view('component/detail_rawat_inap',$data);
    }

    public function selesaiInap($id)
    {
        $rawatInap = RawatInap::find($id);
        $rawatInap->berakhir_rawat = date('Y-m-d');
        $rawatInap->save();
        return redirect("/view/rawat/inap/" . $id)->with('message', 'Berhasil Merubah Status Rawat Inap!');
    }
}
