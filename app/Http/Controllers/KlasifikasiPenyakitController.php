<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KlasifikasiPenyakit;

class KlasifikasiPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function klasifikasipenyakit()
    {
        $klasifikasipenyakit = KlasifikasiPenyakit::all();
        return view('petugas.superadmin.klasifikasi_penyakit')->with('klasifikasipenyakit', $klasifikasipenyakit);
    }

    public function addklasifikasipenyakit()
    {
        return view('petugas.superadmin.add_klasifikasi_penyakit');
    }

    public function tambahklasifikasipenyakit(Request $request)
    {
        
        $validatedData = $request->validate([
            'klasifikasi_penyakit' => 'required'
        ]);

        KlasifikasiPenyakit::create([
            'klasifikasi_penyakit' => $request->klasifikasi_penyakit,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/klasifikasi/penyakit')->with('success', 'Berhasil Menambahkan Data Klasifikasi Penyakit!');
    }

    public function ubahklasifikasipenyakit($id)
    {
        $klasifikasipenyakit = KlasifikasiPenyakit::find($id);
        return view('petugas.superadmin.ubah_klasifikasi_penyakit', compact('klasifikasipenyakit')); 
    }

    function changeklasifikasipenyakit(Request $request, $id) {
        $klasifikasipenyakit = KlasifikasiPenyakit::find($id);
        $klasifikasipenyakit->klasifikasi_penyakit = $request->input('klasifikasi_penyakit');
        $klasifikasipenyakit->update();

        return redirect('/klasifikasi/penyakit')->with('success', 'Berhasil Mengubah Data Klasifikasi Penyakit!');
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
