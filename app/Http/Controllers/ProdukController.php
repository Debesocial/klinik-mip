<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BobotObat;
use App\Models\SatuanObat;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataproduk()
    {
        $produk = Produk::all();

        return view('petugas.obat.data_produk', compact('produk'));
    }

    public function addproduk()
    {
        $bobotobat = BobotObat::all();
        $satuanobat = SatuanObat::all();

        return view('petugas.obat.add_produk', compact('bobotobat', 'satuanobat'));
    }

    public function tambahproduk(Request $request)
    {

        $validatedData = $request->validate([
            'nama_produk' => 'required',
        ]);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'bobot_obat_id' => $request->bobot_obat_id,
            'satuan_obat_id' => $request->satuan_obat_id,
            'komposisi' => $request->komposisi,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return redirect('/data/produk')->with('message', 'Berhasil Menambahkan Data Produk Kesehatan');
    }

    public function ubahproduk($id)
    {

        $produk = Produk::find($id);
        $bobotobat = BobotObat::all();
        $satuanobat = SatuanObat::all();
        return view('petugas.obat.ubah_produk', compact('produk', 'bobotobat', 'satuanobat'));
    }

    function changeproduk(Request $request, $id) {
        $produk = Produk::find($id);
        $produk->nama_produk = $request->input('nama_produk');
        $produk->satuan_obat_id = $request->input('satuan_obat_id');
        $produk->bobot_obat_id = $request->input('bobot_obat_id');
        $produk->komposisi = $request->input('komposisi');
        $produk->update();

        return redirect('/data/produk')->with('message', 'Berhasil Mengubah Data Produk Kesehatan!');
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
