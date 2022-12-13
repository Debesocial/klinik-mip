<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BobotObat;
use App\Models\GolonganObat;
use App\Models\NamaObat;
use App\Models\GolonganAlkes;
use App\Models\NamaAlkes;
use App\Models\Alkes;
use App\Models\SatuanObat;

class AlkesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataalkes()
    {
        $alkes = Alkes::all();

        return view('petugas.obat.data_alkes', compact('alkes'));
    }

    public function addalkes()
    {
        $bobotobat = BobotObat::all();
        $golongan = GolonganAlkes::all();
        $nama = NamaAlkes::all();
        $satuanobat = SatuanObat::all();

        return view('petugas.obat.add_alkes', compact('bobotobat', 'golongan', 'nama', 'satuanobat'));
    }

    public function tambahalkes(Request $request)
    {

        $validatedData = $request->validate([
            'golongan_alkes_id' => 'required',
            'nama_alkes_id' => 'required',
            'bobot_obat_id' => 'required',
            'satuan_obat_id' => 'required',
        ]);

        Alkes::create([
            'golongan_alkes_id' => $request->golongan_alkes_id,
            'nama_alkes_id' => $request->nama_alkes_id,
            'bobot_obat_id' => $request->bobot_obat_id,
            'satuan_obat_id' => $request->satuan_obat_id,
            'komposisis' => $request->komposisis,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return redirect('/data/alkes')->with('message', 'Berhasil Menambahkan Alat/Bahan Kesehatan');
    }

    public function ubahalkes($id)
    {

        $alkes = Alkes::find($id);
        $bobotobat = BobotObat::all();
        $golongan = GolonganAlkes::all();
        $nama = NamaAlkes::all();
        $satuanobat = SatuanObat::all();
        return view('petugas.obat.ubah_alkes', compact('alkes', 'bobotobat', 'golongan', 'nama', 'satuanobat'));
    }

    function changealkes(Request $request, $id) {
        $alkes = Alkes::find($id);
        $alkes->golongan_alkes_id = $request->input('golongan_alkes_id');
        $alkes->nama_alkes_id = $request->input('nama_alkes_id');
        $alkes->satuan_obat_id = $request->input('satuan_obat_id');
        $alkes->bobot_obat_id = $request->input('bobot_obat_id');
        $alkes->komposisis = $request->input('komposisis');
        $alkes->update();

        return redirect('/data/alkes')->with('message', 'Berhasil Mengubah Data Alat/Bahan Kesehatan!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function namaalkes()
    {
        $nama = NamaAlkes::all();
        return view('petugas.obat.nama_alkes')->with('nama', $nama);
    }

    public function addnamaalkes()
    {
        return view('petugas.obat.add_nama_alkes');
    }

    public function tambahnamaalkes(Request $request)
    {
        $validatedData = $request->validate([
            'nama_alkes' => 'required'
        ]);

        NamaAlkes::create([
            'nama_alkes' => $request->nama_alkes,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/nama/alkes')->with('message', 'Berhasil Menambahkan Nama Alat Kesehatan!');
    }

    public function ubahnamaalkes($id)
    {
        $nama = NamaAlkes::find($id);
        return view('petugas.obat.ubah_nama_alkes', compact('nama')); 
    }

    function changenamaalkes(Request $request, $id) {
        $nama = NamaAlkes::find($id);
        $nama->nama_alkes = $request->input('nama_alkes');
        $nama->update();

        return redirect('/nama/alkes')->with('message', 'Berhasil Mengubah Nama Alat Kesehatan!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function golonganalkes()
    {
        $golonganalkes = GolonganAlkes::all();
        return view('petugas.obat.golongan_alkes')->with('golonganalkes', $golonganalkes);
    }

    public function addgolonganalkes()
    {
        return view('petugas.obat.add_golongan_alkes');
    }

    public function tambahgolonganalkes(Request $request)
    {   
        $validatedData = $request->validate([
            'golongan_alkes' => 'required'
        ]);

        GolonganAlkes::create([
            'golongan_alkes' => $request->golongan_alkes,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/golongan/alkes')->with('message', 'Berhasil Menambahkan Golongan Alat Kesehatan!');
    }

    public function ubahgolonganalkes($id)
    {
        $golonganalkes = GolonganAlkes::find($id);
        return view('petugas.obat.ubah_golongan_alkes', compact('golonganalkes')); 
    }

    function changegolonganalkes(Request $request, $id) {
        $golonganalkes = GolonganAlkes::find($id);
        $golonganalkes->golongan_alkes = $request->input('golongan_alkes');
        $golonganalkes->update();

        return redirect('/golongan/alkes')->with('message', 'Berhasil Menambahkan Golongan Alat Kesehatan!');
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
