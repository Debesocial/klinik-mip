<?php

namespace App\Http\Controllers;

use App\Models\NamaObat;
use App\Http\Requests\StoreNamaObatRequest;
use App\Http\Requests\UpdateNamaObatRequest;
use Illuminate\Http\Request;

class NamaObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function namaobat()
    {
        $namaobat = NamaObat::all();
        return view('petugas.superadmin.nama_obat')->with('namaobat', $namaobat);
    }

    public function addnamaobat()
    {
        return view('petugas.superadmin.add_nama_obat');
    }

    public function tambahnamaobat(Request $request)
    {
        $validatedData = $request->validate([
            'nama_obat' => 'required'
        ]);

        NamaObat::create([
            'nama_obat' => $request->nama_obat,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/nama/obat')->with('success', 'Berhasil Menambahkan Nama Obat');
    }

    public function ubahnamaobat($id)
    {
        $namaobat = NamaObat::find($id);
        return view('petugas.superadmin.ubah_nama_obat', compact('namaobat')); 
    }

    function changenamaobat(Request $request, $id) {
        $namaobat = NamaObat::find($id);
        $namaobat->nama_obat = $request->input('nama_obat');
        $namaobat->update();

        return redirect('/nama/obat')->with('success', 'Berhasil Mengubah Nama Obat');
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
     * @param  \App\Http\Requests\StoreNamaObatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNamaObatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NamaObat  $namaObat
     * @return \Illuminate\Http\Response
     */
    public function show(NamaObat $namaObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NamaObat  $namaObat
     * @return \Illuminate\Http\Response
     */
    public function edit(NamaObat $namaObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNamaObatRequest  $request
     * @param  \App\Models\NamaObat  $namaObat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNamaObatRequest $request, NamaObat $namaObat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NamaObat  $namaObat
     * @return \Illuminate\Http\Response
     */
    public function destroy(NamaObat $namaObat)
    {
        //
    }
}
