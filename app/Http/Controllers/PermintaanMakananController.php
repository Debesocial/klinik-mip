<?php

namespace App\Http\Controllers;

use App\Models\NamaPenyakit;
use App\Models\PermintaanMakanan;
use Illuminate\Http\Request;


class PermintaanMakananController extends Controller
{
    public function tampilFormTambah($id)
    {
        $data['id_rawat_inap'] = $id;
        $data['penyakit'] = NamaPenyakit::all();

        return view('/component/form_tambah_permintaan_makanan', $data);
    }

    public function simpan(Request $request)
    {
        $data = $request->except('_token');
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;

        if (PermintaanMakanan::create($data)) {
            return redirect("/view/rawat/inap/" . $data['id_rawat_inap'])->with('message', 'Berhasil Menambahkan Permintaan Makanan!');
        }
    }
}
