<?php

namespace App\Http\Controllers;

use App\Models\NamaPenyakit;
use App\Models\SubKlasifikasi;
use Illuminate\Http\Request;

class NamaPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function namapenyakit()
    {
        $namapenyakit = NamaPenyakit::all();
        
        
        return view('petugas.superadmin.nama_penyakit')->with('namapenyakit', $namapenyakit);
    }

    public function addnamapenyakit()
    {
        $namapenyakit = NamaPenyakit::all();
        $subklasifikasi = SubKlasifikasi::all();

        return view('petugas.superadmin.add_nama_penyakit', compact('namapenyakit', 'subklasifikasi'));
    }

    public function tambahnamapenyakit(Request $request)
    {
        
        $validatedData = $request->validate([
            'primer' => 'required',
            'sekunder' => '',
            'sub_klasifikasi_id' => 'required'
        ]);

        NamaPenyakit::create([
            'primer' => $request->primer,
            'sekunder' => $request->sekunder,
            'sub_klasifikasi_id' => $request->sub_klasifikasi_id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/nama/penyakit')->with('success', 'Berhasil Menambahkan Diagnosa!');
    }

    public function ubahnamapenyakit($id)
    {
        $namapenyakit = NamaPenyakit::find($id);
        $subklasifikasi = SubKlasifikasi::all();
        return view('petugas.superadmin.ubah_nama_penyakit', compact('namapenyakit', 'subklasifikasi')); 
    }

    function changenamapenyakit(Request $request, $id) {
        $namapenyakit = NamaPenyakit::find($id);
        $namapenyakit->primer = $request->input('primer');
        $namapenyakit->sekunder = $request->input('sekunder');
        $namapenyakit->sub_klasifikasi_id = $request->input('sub_klasifikasi_id');
        $namapenyakit->update();

        return redirect('/nama/penyakit')->with('success', 'Berhasil Mengubah Diagnosa!');
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
