<?php

namespace App\Http\Controllers;

use App\Models\JenisObat;
use App\Http\Requests\StoreJenisObatRequest;
use App\Http\Requests\UpdateJenisObatRequest;
use Illuminate\Http\Request;

class JenisObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jenisobat()
    {
        $jenisobat = JenisObat::all();
        return view('petugas.superadmin.jenis_obat')->with('jenisobat', $jenisobat);
    }

    public function addjenisobat()
    {
        return view('petugas.superadmin.add_jenis_obat');
    }

    public function tambahjenisobat(Request $request)
    {
        $validatedData = $request->validate([
            'nama_jenis_obat' => 'required'
        ]);

        JenisObat::create([
            'nama_jenis_obat' => $request->nama_jenis_obat,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/nama/obat')->with('success', 'Successfully!');
    }

    public function ubahjenisobat($id)
    {
        $jenisobat = JenisObat::find($id);
        return view('petugas.superadmin.ubah_jenis_obat', compact('jenisobat')); 
    }

    function changejenisobat(Request $request, $id) {
        $jenisobat = JenisObat::find($id);
        $jenisobat->nama_jenis_obat = $request->input('nama_jenis_obat');
        $jenisobat->update();

        return redirect('/jenis/obat')->with('success', 'Successfully!');
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
     * @param  \App\Http\Requests\StoreJenisObatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisObatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisObat  $jenisObat
     * @return \Illuminate\Http\Response
     */
    public function show(JenisObat $jenisObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisObat  $jenisObat
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisObat $jenisObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisObatRequest  $request
     * @param  \App\Models\JenisObat  $jenisObat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisObatRequest $request, JenisObat $jenisObat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisObat  $jenisObat
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisObat $jenisObat)
    {
        //
    }
}
