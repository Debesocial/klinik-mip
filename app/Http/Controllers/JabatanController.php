<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jabatan()
    {
        $jabatan = Jabatan::all();
        return view('petugas.superadmin.jabatan')->with('jabatan', $jabatan);
    }

    public function addjabatan()
    {
        return view('petugas.superadmin.add_jabatan');
    }

    public function tambahjabatan(Request $request)
    {
        $validatedData = $request->validate([
            'nama_jabatan' => 'required'
        ]);

        Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/jabatan')->with('message', 'Successfully!');
    }

    public function ubahjabatan($id)
    {
        $jabatan = Jabatan::find($id);
        return view('petugas.superadmin.ubah_jabatan', compact('jabatan')); 
    }

    function changejabatan(Request $request, $id) {
        $jabatan = Jabatan::find($id);
        $jabatan->nama_jabatan = $request->input('nama_jabatan');
        $jabatan->update();

        return redirect('/jabatan')->with('message', 'Successfully!');
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
     * @param  \App\Http\Requests\StoreJabatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJabatanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJabatanRequest  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJabatanRequest $request, Jabatan $jabatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        //
    }
}
