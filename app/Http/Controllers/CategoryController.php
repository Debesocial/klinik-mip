<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\KlasifikasiPenyakit;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $category = Category::with(['klasifikasi_penyakit'])->get();
        
        
        return view('petugas.superadmin.category')->with('category', $category);
    }

    public function addCategory()
    {
        $category = Category::all();
        $klasifikasipenyakit = KlasifikasiPenyakit::all();

        return view('petugas.superadmin.add_category', compact('category', 'klasifikasipenyakit'));
    }

    public function tambahCategory(Request $request)
    {
        
        $validatedData = $request->validate([
            'nama_penyakit' => 'required',
            'klasifikasi_penyakit_id' => 'required'
        ]);

        Category::create([
            'nama_penyakit' => $request->nama_penyakit,
            'klasifikasi_penyakit_id' => $request->klasifikasi_penyakit_id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/category')->with('success', 'Berhasil Menambahkan Data Sub Klasifikasi Penyakit');
    }

    public function ubahCategory($id)
    {
        $category = Category::find($id);
        $klasifikasipenyakit = KlasifikasiPenyakit::all();
        return view('petugas.superadmin.ubah_category', compact('category', 'klasifikasipenyakit')); 
    }

    function changeCategory(Request $request, $id) {
        $category = Category::find($id);
        $category->nama_penyakit = $request->input('nama_penyakit');
        $category->klasifikasi_penyakit_id = $request->input('klasifikasi_penyakit_id');
        $category->update();

        return redirect('/category')->with('success', 'Berhasil Mengubah Data Sub Klasifikasi Penyakit');
    }
}
