<?php

namespace App\Http\Controllers;

use App\Models\GolonganObat;
use App\Http\Requests\StoreGolonganObatRequest;
use App\Http\Requests\UpdateGolonganObatRequest;
use Illuminate\Http\Request;

class GolonganObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function golonganobat()
    {
        $golonganobat = GolonganObat::all();
        return view('petugas.superadmin.golongan_obat')->with('golonganobat', $golonganobat);
    }

    public function addgolonganobat()
    {
        return view('petugas.superadmin.add_golongan_obat');
    }

    public function tambahgolonganobat(Request $request)
    {
        $validatedData = $request->validate([
            'nama_golongan_obat' => 'required'
        ]);

        GolonganObat::create([
            'nama_golongan_obat' => $request->nama_golongan_obat,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/golongan/obat')->with('success', 'Berhasil Menambahkan Golongan Obat!');
    }

    public function ubahgolonganobat($id)
    {
        $golonganobat = GolonganObat::find($id);
        return view('petugas.superadmin.ubah_golongan_obat', compact('golonganobat')); 
    }

    function changegolonganobat(Request $request, $id) {
        $golonganobat = GolonganObat::find($id);
        $golonganobat->nama_golongan_obat = $request->input('nama_golongan_obat');
        $golonganobat->update();

        return redirect('/golongan/obat')->with('success', 'Berhasil Menambahkan Golongan Obat!');
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
     * @param  \App\Http\Requests\StoreGolonganObatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGolonganObatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GolonganObat  $golonganObat
     * @return \Illuminate\Http\Response
     */
    public function show(GolonganObat $golonganObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GolonganObat  $golonganObat
     * @return \Illuminate\Http\Response
     */
    public function edit(GolonganObat $golonganObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGolonganObatRequest  $request
     * @param  \App\Models\GolonganObat  $golonganObat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGolonganObatRequest $request, GolonganObat $golonganObat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GolonganObat  $golonganObat
     * @return \Illuminate\Http\Response
     */
    public function destroy(GolonganObat $golonganObat)
    {
        //
    }
}
