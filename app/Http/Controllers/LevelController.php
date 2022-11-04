<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;

use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function level()
    {
        $level = Level::all();
        return view('petugas.superadmin.level')->with('level', $level);
    }

    public function addlevel()
    {
        return view('petugas.superadmin.add_level');
    }

    public function tambahlevel(Request $request)
    {
        $validatedData = $request->validate([
            'nama_level' => 'required'
        ]);

        Level::create([
            'nama_level' => $request->nama_level
        ]);

        return redirect('/level')->with('success', 'Berhasil Menambahkan Kategori Petugas!');
    }

    public function ubahlevel($id)
    {
        $level = Level::find($id);
        return view('petugas.superadmin.ubah_level', compact('level')); 
    }

    function changelevel(Request $request, $id) {
        $level = Level::find($id);
        $level->nama_level = $request->input('nama_level');
        $level->update();

        return redirect('/level')->with('success', 'Berhasil Mengubah Kategori Pasien!');
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
