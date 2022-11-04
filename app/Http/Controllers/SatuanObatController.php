<?php

namespace App\Http\Controllers;

use App\Models\SatuanObat;
use App\Http\Requests\StoreSatuanObatRequest;
use App\Http\Requests\UpdateSatuanObatRequest;
use Illuminate\Http\Request;

class SatuanObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function satuanobat()
    {
        $satuanobat = SatuanObat::all();
        return view('petugas.superadmin.satuan_obat')->with('satuanobat', $satuanobat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addsatuanobat()
    {
        return view('petugas.superadmin.add_satuan_obat');
    }

    public function tambahsatuanobat(Request $request)
    {
        $validatedData = $request->validate([
            'satuan_obat' => 'required'
        ]);

        SatuanObat::create([
            'satuan_obat' => $request->satuan_obat,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/satuan/obat')->with('success', 'Berhasil Menambahkan Satuan Obat/Alkes!');
    }

    public function ubahsatuanobat($id)
    {
        $satuanobat = SatuanObat::find($id);
        return view('petugas.superadmin.ubah_satuan_obat', compact('satuanobat')); 
    }

    function changesatuanobat(Request $request, $id) {
        $satuanobat = SatuanObat::find($id);
        $satuanobat->satuan_obat = $request->input('satuan_obat');
        $satuanobat->update();

        return redirect('/satuan/obat')->with('success', 'Berhasil Menambahkan Satuan Obat/Alkes!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSatuanObatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSatuanObatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SatuanObat  $satuanObat
     * @return \Illuminate\Http\Response
     */
    public function show(SatuanObat $satuanObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SatuanObat  $satuanObat
     * @return \Illuminate\Http\Response
     */
    public function edit(SatuanObat $satuanObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSatuanObatRequest  $request
     * @param  \App\Models\SatuanObat  $satuanObat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSatuanObatRequest $request, SatuanObat $satuanObat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SatuanObat  $satuanObat
     * @return \Illuminate\Http\Response
     */
    public function destroy(SatuanObat $satuanObat)
    {
        //
    }
}
