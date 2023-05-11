<?php

namespace App\Http\Controllers;

use App\Models\NamaPenyakit;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\RawatInap;

class RawatInapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewrawatinap($id)
    {
        // $pasien = Pasien::find($id);
        $rawat_inap = RawatInap::find($id);

        return view('petugas.rawatinap.view_rawat_inap', compact('rawat_inap'));
    }

    public function daftarrawatinap()
    {
        $rawat_inap = RawatInap::get();

        return view('petugas.rawatinap.daftar_rawat_inap', compact('rawat_inap'));
    }

    public function addrawatinap()
    {
        $pasien_id = Pasien::get();
        $nama_penyakit = NamaPenyakit::get();

        return view('petugas.rawatinap.add_rawat_inap', compact('pasien_id', 'nama_penyakit'));
    }

    public function tambahrawatinap(Request $request)
    {

        $validatedData = $request->validate([
            'pasien_id' => 'required',
            'mulai_rawat' => 'required',
            'nama_penyakit_id' => 'required',
        ]);

        RawatInap::create([
            'pasien_id' => $request->pasien_id,
            'mulai_rawat' => $request->mulai_rawat,
            'berakhir_rawat' => $request->berakhir_rawat,
            'nama_penyakit_id' => $request->nama_penyakit_id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return redirect('/daftar/rawat/inap')->with('success', 'Berhasil Menambahkan Data');
    }

    public function ubahrawatinap($id)
    {
        $rawat_inap = RawatInap::find($id);
        $nama_penyakit = NamaPenyakit::all();

        return view('petugas.rawatinap.ubah_rawat_inap', compact('rawat_inap', 'nama_penyakit'));
    }

    function changerawatinap(Request $request, $id) {
        
        $rawat_inap = RawatInap::find($id);
        $rawat_inap->mulai_rawat = $request->input('mulai_rawat');
        $rawat_inap->berakhir_rawat = $request->input('berakhir_rawat');
        $rawat_inap->nama_penyakit_id = $request->input('nama_penyakit_id');
        $rawat_inap->update();

        return redirect('/daftar/rawat/inap')->with('message', 'Berhasil mengubah data rawat inap');
        
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
