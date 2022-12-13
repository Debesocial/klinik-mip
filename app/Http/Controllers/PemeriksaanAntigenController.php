<?php

namespace App\Http\Controllers;

use App\Models\PemeriksaanAntigen;
use Illuminate\Http\Request;

class PemeriksaanAntigenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pemeriksaanantigen()
    {
        $pemeriksaanantigen = PemeriksaanAntigen::all();
        return view('petugas.superadmin.pemeriksaan_antigen')->with('pemeriksaanantigen', $pemeriksaanantigen);
    }

    public function addpemeriksaanantigen()
    {
        return view('petugas.superadmin.add_pemeriksaan_antigen');
    }

    public function tambahpemeriksaanantigen(Request $request)
    {
        $validatedData = $request->validate([
            'kebutuhan' => 'required'
        ]);

        PemeriksaanAntigen::create([
            'kebutuhan' => $request->kebutuhan,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/pemeriksaan/antigen')->with('message', 'Berhasil Menambahkan Data Pemeriksaan Antigen!');
    }

    public function ubahpemeriksaanantigen($id)
    {
        $pemeriksaanantigen = PemeriksaanAntigen::find($id);
        return view('petugas.superadmin.ubah_pemeriksaan_antigen', compact('pemeriksaanantigen'));
    }

    function changepemeriksaanantigen(Request $request, $id) {
        $pemeriksaanantigen = PemeriksaanAntigen::find($id);
        $pemeriksaanantigen->kebutuhan = $request->input('kebutuhan');
        $pemeriksaanantigen->update();

        return redirect('/pemeriksaan/antigen')->with('message', 'Berhasil Mengubah Data Pemeriksaan Antigen!');
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
