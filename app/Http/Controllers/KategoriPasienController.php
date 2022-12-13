<?php

namespace App\Http\Controllers;

use App\Models\KategoriPasien;
use App\Http\Requests\StoreKategoriPasienRequest;
use App\Http\Requests\UpdateKategoriPasienRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kategoripasien()
    {
        $kategoripasien = KategoriPasien::all();
        return view('petugas.superadmin.kategori_pasien')->with('kategoripasien', $kategoripasien);
    }
    
    public function addkategoripasien()
    {
        return view('petugas.superadmin.add_kategori_pasien');
    }

    public function tambahkategoripasien(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required'
        ]);

        KategoriPasien::create([
            'nama_kategori' => $request->nama_kategori,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/kategori/pasien')->with('message', 'Sukses mengubah kategori pasien!');
    }

    public function ubahkategoripasien($id)
    {
        $kategoripasien = KategoriPasien::find($id);
        return view('petugas.superadmin.ubah_kategori_pasien', compact('kategoripasien')); 
    }

    function changekategoripasien(Request $request, $id) {
        $kategoripasien = KategoriPasien::find($id);
        $kategoripasien->nama_kategori = $request->input('nama_kategori');
        $kategoripasien->update();

        return redirect('/kategori/pasien')->with('message', 'Sukses mengubah kategori pasien!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriPasienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriPasienRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriPasien  $kategoriPasien
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriPasien $kategoriPasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriPasien  $kategoriPasien
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriPasien $kategoriPasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriPasienRequest  $request
     * @param  \App\Models\KategoriPasien  $kategoriPasien
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriPasienRequest $request, KategoriPasien $kategoriPasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriPasien  $kategoriPasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriPasien $kategoriPasien)
    {
        //
    }
}
