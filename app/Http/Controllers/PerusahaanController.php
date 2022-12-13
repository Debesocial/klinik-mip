<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Http\Requests\StorePerusahaanRequest;
use App\Http\Requests\UpdatePerusahaanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perusahaan()
    {
        $perusahaan = Perusahaan::all();
        return view('petugas.superadmin.perusahaan')->with('perusahaan', $perusahaan);
    }

    public function addperusahaan()
    {
        return view('petugas.superadmin.add_perusahaan');
    }

    public function tambahperusahaan(Request $request)
    {
        $validatedData = $request->validate([
            'nama_perusahaan_pasien' => 'required'
        ]);

        Perusahaan::create([
            'nama_perusahaan_pasien' => $request->nama_perusahaan_pasien,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/perusahaan')->with('message', 'Berhasil Menambahkan Data Perusahaan!');
    }

    public function ubahperusahaan($id)
    {
        $perusahaan = Perusahaan::find($id);
        return view('petugas.superadmin.ubah_perusahaan', compact('perusahaan')); 
    }

    function changeperusahaan(Request $request, $id) {
        $perusahaan = Perusahaan::find($id);
        $perusahaan->nama_perusahaan_pasien = $request->input('nama_perusahaan_pasien');
        $perusahaan->update();

        return redirect('/perusahaan')->with('message', 'Berhasil Mengubah Data Perusahaan!');
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
     * @param  \App\Http\Requests\StorePerusahaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePerusahaanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function show(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerusahaanRequest  $request
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerusahaanRequest $request, Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perusahaan $perusahaan)
    {
        //
    }
}
