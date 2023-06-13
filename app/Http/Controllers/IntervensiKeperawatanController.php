<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alkes;
use App\Models\NamaAlkes;
use App\Models\IntervensiKeperawatan;
use App\Models\RawatInap;

class IntervensiKeperawatanController extends Controller
{
    public function tampilFormTambah($id)
    {
        $data['id_rawat_inap'] = $id;
        $rawatinap = RawatInap::find($id);
        if ($rawatinap->berakhir_rawat!=null) {
            return "Rawat Inap Sudah Selesai";
        }
        $data['alatkesehatan'] = Alkes::all();

        return view('component/form_tambah_intervensi', $data);
    }

    public function simpan(Request $request)
    {
        $data = $request->except('_token');
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;
        if (IntervensiKeperawatan::create($data)) {
            return redirect("/view/rawat/inap/" . $data['id_rawat_inap']."/2")->with('message', 'Berhasil Menambahkan Intervensi Keperawatan!');
        }
    }

    public function tampilFormUbah($id)
    {
        $data['intervensi'] = IntervensiKeperawatan::find($id);
        if ($data['intervensi']->rawatinap->berakhir_rawat!=null) {
            return "Rawat Inap Sudah Selesai";
        }
        $data['alatkesehatan'] = Alkes::all();
        

        return view('component/form_ubah_intervensi', $data);
    }

    public function ubah(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_by'] = auth()->user()->id;

        if (IntervensiKeperawatan::where('id', $id)->update($data)) {
            return redirect("/view/rawat/inap/" . $data['id_rawat_inap']."/2")->with('message', 'Berhasil Mengubah Intervensi Keperawatan!');
        }
    }

    public function tampil($id)
    {
        $data['intervensi'] = IntervensiKeperawatan::find($id);
        $data['alatkesehatan'] = Alkes::all();

        return view('component/view_intervensi', $data);
    }
}
