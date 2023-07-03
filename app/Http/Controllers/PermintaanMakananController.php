<?php

namespace App\Http\Controllers;

use App\Models\NamaPenyakit;
use App\Models\PermintaanMakanan;
use App\Models\RawatInap;
use Illuminate\Http\Request;


class PermintaanMakananController extends Controller
{
    public function tampilFormTambah($id)
    {
        $data['id_rawat_inap'] = $id;
        $rawatinap = RawatInap::find($id);
        if ($rawatinap->berakhir_rawat!=null) {
            return "Rawat Inap Sudah Selesai";
        }
        $data['penyakit'] = NamaPenyakit::all();

        return view('/component/form_tambah_permintaan_makanan', $data);
    }

    public function simpan(Request $request)
    {
        $data = $request->except('_token');
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;

        if (PermintaanMakanan::create($data)) {
            return redirect("/view/rawat/inap/" . $data['id_rawat_inap']."/3")->with('message', 'Berhasil Menambahkan Permintaan Makanan!');
        }
    }

    public function tampilFormUbah($id)
    {
        $data['permintaanmakanan'] = PermintaanMakanan::find($id);
        if ($data['permintaanmakanan']->rawatinap->berakhir_rawat!=null) {
            return "Rawat Inap Sudah Selesai";
        }
        $data['penyakit'] = NamaPenyakit::all();
        return view('/component/form_ubah_permintaan_makanan', $data);

    }

    public function ubah(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_by'] = auth()->user()->id;

        if (PermintaanMakanan::where('id', $id)->update($data)) {
            return redirect("/view/rawat/inap/" . $data['id_rawat_inap']."/3")->with('message', 'Berhasil Merubah Permintaan Makanan!');
        }
    }

    public function tampil($id)
    {
        $data['permintaanmakanan']= PermintaanMakanan::find($id);
        return view('component/view_permintaan_makanan', $data);
    }
}
