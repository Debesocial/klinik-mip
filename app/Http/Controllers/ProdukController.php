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
        $produk = Produk::with(['satuan_obat','bobot_obat'])->get();

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

        $data = $request->except('_token');
        $harga = str_replace('.','',$request->harga);
        $harga = str_replace(',','.',$harga);
        $data['harga'] = (float)$harga;
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;

        Produk::create($data);

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
       $data = $request->except(['id','_token']);
       $harga = str_replace('.','',$request->harga);
        $harga = str_replace(',','.',$harga);
        $data['harga'] = (float)$harga;
       $data['updated_by'] = auth()->user()->id;
       Produk::where('id',$id)->update($data);
        

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
