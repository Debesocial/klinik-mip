<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\HasilPemantauan;
use App\Models\McuAwal;

class McuController extends Controller
{
    public function index()
    {
        $data['mcuawal'] = McuAwal::all();
        return view('petugas.pemeriksaan.data_mcu', $data);
    }

    public function halamanTambahMcuAwal()
    {
        $data['pasien_id']= Pasien::all();
        $data['hasilpemantauan'] =  HasilPemantauan::all();
        return view('petugas.pemeriksaan.add_mcu_awal', $data);
    }

    public function halamanUbahMcuAwal($id)
    {
        $data['hasilpemantauan'] = HasilPemantauan::all();
        $data['mcuawal'] = McuAwal::find($id);
        return view('petugas.pemeriksaan.ubah_mcu_awal', $data);
    }

    public function ubahMcuAwal(Request $request,$id)
    {
        $data = $request->except(['_token','pasien_id']);
        $data['updated_by']=auth()->user()->id;

        if(McuAwal::where('id',$id)->update($data)){
            return redirect("mcu/$id")->with(['message'=>'Berhasil Mengubah Pemeriksaan Instruksi Dokter!', 'show'=>1]);
        };
    }

    public function detailMcuAwal($id)  
    {
        $data['mcuawal'] = McuAwal::find($id);

        return view('petugas.pemeriksaan.view_mcu_awal', $data);
    }
}
