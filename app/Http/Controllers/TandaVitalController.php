<?php

namespace App\Http\Controllers;

use App\Models\HasilPemantauan;
use App\Models\SatuanObat;
use App\Models\TandaVital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TandaVitalController extends Controller
{
    public function tampilFormTambah($id)
    {
        $data['id_rawat_inap']=$id;
        $data['hasilpemantauan'] = HasilPemantauan::all();
        $data['satuanobat'] = SatuanObat::all();
        return view('component/form_tambah_vital', $data);
    }

    public function simpan(Request $request)
    {
        $data = $request->except('_token');
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('petugas/pemantauan_tandavital/file', $filename);
            $data['dokumen'] = $filename;
        } else {
            $filename = '';
        }
        
        if (TandaVital::create($data)) {
            return redirect("/view/rawat/inap/" . $data['id_rawat_inap'])->with('message', 'Berhasil Menambahkan Pemeriksaan Tanda Vital!');
        }
    }

    public function tampilFormUbah($id)
    {
        $data['tandavital'] = TandaVital::find($id);
        $data['hasilpemantauan'] = HasilPemantauan::all();
        $data['satuanobat'] = SatuanObat::all();

        return view('component/form_ubah_vital', $data);
    }

    public function ubah(Request $request, $id)
    {
        $data = $request->except(['_token','old_dokumen']);
        $data['updated_by'] = auth()->user()->id;

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();  
            $file->move('petugas/pemantauan_tandavital/file', $filename);
            if ($request->old_dokumen) {
                $path = parse_url('petugas/pemantauan_tandavital/file/'.$request->old_dokumen);
                File::delete(public_path($path['path']));
            }
            $data['dokumen']=$filename;
        }
        if (TandaVital::where('id',$id)->update($data)) {
            return redirect("/view/rawat/inap/" . $data['id_rawat_inap'])->with('message', 'Berhasil Menambahkan Pemeriksaan Tanda Vital!');
        }
    }

    public function tampil($id)
    {
        $data['tandavital']= TandaVital::find($id);
        $data['hasilpemantauan'] = HasilPemantauan::all();
        $data['satuanobat'] = SatuanObat::all();
        
        return view('component/view_vital', $data);
    }
}