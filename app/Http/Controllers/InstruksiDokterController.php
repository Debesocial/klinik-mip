<?php

namespace App\Http\Controllers;

use App\Models\Alkes;
use Illuminate\Http\Request;
use App\Models\InstruksiDokter;

use App\Models\NamaAlkes;
use App\Models\NamaPenyakit;
use App\Models\Obat;
use App\Models\RawatInap;
use App\Models\SatuanObat;


class InstruksiDokterController extends Controller
{
    public function index()
    {
        $InsturksiDokter = InstruksiDokter::find(1);
        $RawatInap = RawatInap::find(1);
        // var_dump($InsturksiDokter->rawatinap->pasien_id);
        // var_dump($RawatInap->instruksidokter[0]->hasil_pemeriksaan);
    }

    public function tampilFormTambah($id)
    {
        $data['id_rawat_inap'] = $id;
        $data['namapenyakit'] = NamaPenyakit::all();
        $data['alatkesehatan'] = Alkes::all();
        $data['satuanobat'] = SatuanObat::all();
        $data['obat'] = Obat::get();
        return view('/component/form_tambah_instruksi_dokter', $data);
    }

    public function tampilFormUbah($id)
    {
        $data['instruksidokter'] = InstruksiDokter::find($id);
        $data['namapenyakit'] = NamaPenyakit::all();
        $data['alatkesehatan'] = Alkes::all();
        $data['satuanobat'] = SatuanObat::all();
        $data['obat'] = Obat::get();

        return  view('/component/form_ubah_instruksi_dokter', $data);
    }

    public function tampil($id)
    {
        $data['instruksidokter'] = InstruksiDokter::find($id);
        $data['alatkesehatan'] = Alkes::all();
        $data['satuanobat'] = SatuanObat::all();

        return view('/component/view_instruksi_dokter', $data);
    }

    public function simpan(Request $request)
    {
        $data = $request->except('_token');
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;
        if (InstruksiDokter::create($data)) {
            return redirect("/view/rawat/inap/" . $data['id_rawat_inap'])->with('message', 'Berhasil Menambahkan Pemeriksaan Instruksi Dokter!');
        }
    }

    public function ubah(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_by'] = auth()->user()->id;

        if (InstruksiDokter::where('id', $id)->update($data)) {
            return redirect("/view/rawat/inap/" . $data['id_rawat_inap'])->with('message', 'Berhasil Mengubah Pemeriksaan Instruksi Dokter!');
        }
    }
}
