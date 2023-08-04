<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Http\Requests\StoreDivisiRequest;
use App\Http\Requests\UpdateDivisiRequest;
use App\Models\Perusahaan;
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
        $divisi = Divisi::with(['perusahaan'])->get();
        return view('petugas.superadmin.divisi')->with('divisi', $divisi);
    }

    public function adddivisi()
    {
        $data['perusahaan'] = Perusahaan::get();
        return view('petugas.superadmin.add_divisi', $data);
    }

    public function tambahdivisi(Request $request)
    {
        $validatedData = $request->validate([
            'nama_divisi_pasien' => 'required'
        ]);

        Divisi::create([
            'nama_divisi_pasien' => $request->nama_divisi_pasien,
            'perusahaan_id' => $request->perusahaan_id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/divisi')->with('success', 'Berhasil Menambahkan Divisi');
    }

    public function ubahdivisi($id)
    {
        $divisi = Divisi::find($id);
        $perusahaan = Perusahaan::get();
        return view('petugas.superadmin.ubah_divisi', compact('divisi', 'perusahaan')); 
    }

    function changedivisi(Request $request, $id) {
        $divisi = Divisi::find($id);
        $divisi->nama_divisi_pasien = $request->input('nama_divisi_pasien');
        $divisi->perusahaan_id = $request->input('perusahaan_id');
        $divisi->update();

        return redirect('/divisi')->with('success', 'Berhasil Mengubah Divisi');
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
