<?php

namespace App\Http\Controllers;

use App\Models\Dosis;
use Illuminate\Http\Request;

class DosisController extends Controller
{
    function index(){
        $data['dosis'] = Dosis::get();

        return view('petugas.superadmin.data_dosis',$data);
    }

    function halamanTambah() {
        return view('petugas.superadmin.add_dosis');
    }

    function tambah(Request $request) {
        $data = $request->except('_token');
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;
        $save = Dosis::create($data);
        if ($save) {
            return redirect('/dosis')->with('message', 'Dosis berhasil ditambah');
        }
    }

    function halamanUbah($id) {
        $data['dosis'] = Dosis::find($id);
        return view('petugas.superadmin.ubah_dosis',$data);

    }

    function ubah(Request $request, $id) {
        $data = $request->except('_token');
        $save = Dosis::where(['id'=>$id])->update($data);
        if ($save) {
            return redirect('/dosis')->with('message', 'Dosis berhasil diubah');
        }
    }
}
