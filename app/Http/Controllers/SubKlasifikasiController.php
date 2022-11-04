<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiPenyakit;
use App\Models\SubKlasifikasi;
use Illuminate\Http\Request;

class SubKlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subklasifikasi()
    {
        $subklasifikasi = SubKlasifikasi::all();
        
        
        return view('petugas.superadmin.sub_klasifikasi')->with('subklasifikasi', $subklasifikasi);
    }

    public function addsubklasifikasi()
    {
        $subklasifikasi = SubKlasifikasi::all();
        $klasifikasipenyakit = KlasifikasiPenyakit::all();

        return view('petugas.superadmin.add_sub_klasifikasi', compact('subklasifikasi', 'klasifikasipenyakit'));
    }

    public function tambahsubklasifikasi(Request $request)
    {
        
        $validatedData = $request->validate([
            'nama_penyakit' => 'required',
            'klasifikasi_penyakit_id' => 'required'
        ]);

        SubKlasifikasi::create([
            'nama_penyakit' => $request->nama_penyakit,
            'klasifikasi_penyakit_id' => $request->klasifikasi_penyakit_id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/sub/klasifikasi')->with('success', 'Berhasil Menambahkan Sub Klasifikasi Penyakit!');
    }

    public function ubahsubklasifikasi($id)
    {
        $subklasifikasi = SubKlasifikasi::find($id);
        $klasifikasipenyakit = KlasifikasiPenyakit::all();
        return view('petugas.superadmin.ubah_sub_klasifikasi', compact('subklasifikasi', 'klasifikasipenyakit')); 
    }

    function changesubklasifikasi(Request $request, $id) {
        $subklasifikasi = SubKlasifikasi::find($id);
        $subklasifikasi->nama_penyakit = $request->input('nama_penyakit');
        $subklasifikasi->klasifikasi_penyakit_id = $request->input('klasifikasi_penyakit_id');
        $subklasifikasi->update();

        return redirect('/sub/klasifikasi')->with('success', 'Berhasil Mengubah Sub Klasifikasi Penyakit!');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
