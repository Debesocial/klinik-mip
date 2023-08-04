<?php

namespace App\Http\Controllers;

use App\Models\AturanPakai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AturanPakaiController extends Controller
{
    function index(){
        $data['aturan_pakai'] = AturanPakai::get();

        return view('petugas.superadmin.data_aturan_pakai',$data);
    }

    function halamanTambah() {
        return view('petugas.superadmin.add_aturan_pakai');
    }

    function tambah(Request $request) {
        $data = $request->except('_token');
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;
        $save = AturanPakai::create($data);
        if ($save) {
            return redirect('/aturan_pakai')->with('message', 'Aturan pakai berhasil ditambah');
        }
    }

    function halamanUbah($id) {
        $data['aturan_pakai'] = AturanPakai::find($id);
        return view('petugas.superadmin.ubah_aturan_pakai',$data);

    }

    function ubah(Request $request, $id) {
        $data = $request->except('_token');
        $save = AturanPakai::where(['id'=>$id])->update($data);
        if ($save) {
            return redirect('/aturan_pakai')->with('message', 'Aturan pakai berhasil diubah');
        }
    }
}
