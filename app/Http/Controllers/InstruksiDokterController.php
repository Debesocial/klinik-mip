<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstruksiDokter;
use App\Models\RawatInap;

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
        $data['id_rawat_inap']= $id;
        return view('/component/form_tambah_instruksi_dokter',$data);
    }

    public function simpan(Request $request)
    {
        $data = $request->except('_token');
        $data['created_by']=auth()->user()->id;
        $data['updated_by']=auth()->user()->id;
        if(InstruksiDokter::create($data)){
            return redirect("/view/rawat/inap/".$data['id_rawat_inap'])->with('message', 'Berhasil Menambahkan Pemeriksaan Instruksi Dokter!');
        }
    }
}
