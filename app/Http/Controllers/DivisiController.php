<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Http\Requests\StoreDivisiRequest;
use App\Http\Requests\UpdateDivisiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function divisi()
    {
        $divisi = Divisi::all();
        return view('petugas.superadmin.divisi')->with('divisi', $divisi);
    }

    public function adddivisi()
    {
        return view('petugas.superadmin.add_divisi');
    }

    public function tambahdivisi(Request $request)
    {
        $validatedData = $request->validate([
            'nama_divisi_pasien' => 'required'
        ]);

        Divisi::create([
            'nama_divisi_pasien' => $request->nama_divisi_pasien,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/divisi')->with('success', 'Successfully!');
    }

    public function ubahdivisi($id)
    {
        $divisi = Divisi::find($id);
        return view('petugas.superadmin.ubah_divisi', compact('divisi')); 
    }

    function changedivisi(Request $request, $id) {
        $divisi = Divisi::find($id);
        $divisi->nama_divisi_pasien = $request->input('nama_divisi_pasien');
        $divisi->update();

        return redirect('/jabatan')->with('success', 'Successfully!');
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
     * @param  \App\Http\Requests\StoreDivisiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDivisiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisi $divisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDivisiRequest  $request
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDivisiRequest $request, Divisi $divisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $divisi)
    {
        //
    }
}
