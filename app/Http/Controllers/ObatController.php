<?php

namespace App\Http\Controllers;


use App\Models\BobotObat;
use App\Models\GolonganObat;

use App\Models\NamaObat;
use App\Models\Obat;
use App\Models\SatuanObat;
use App\Models\Sediaan;
use Illuminate\Http\Request;


class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataobats()
    {
        $obat = Obat::with('golongan_obat','satuan_obat','bobot_obat','sediaan_obat')->get();

        return view('petugas.obat.data_obats', compact('obat'));
    }

    public function addobats()
    {
        $bobotobat = BobotObat::all();
        $golonganobat = GolonganObat::all();
        $namaobat = NamaObat::all();
        $satuanobat = SatuanObat::all();
        $sediaan = Sediaan::get();

        return view('petugas.obat.add_obats', compact('bobotobat', 'golonganobat', 'namaobat', 'satuanobat','sediaan'));
    }

    public function tambahobats(Request $request)
    {

        // $validatedData = $request->validate([
        //     'golongan_obat_id' => 'required',
        //     'nama_obat_id' => 'required',
        //     'bobot_obat_id' => 'required',
        //     'satuan_obat_id' => 'required',
        // ]);

        // Obat::create([
        //     'golongan_obat_id' => $request->golongan_obat_id,
        //     'nama_obat_id' => $request->nama_obat_id,
        //     'bobot_obat_id' => $request->bobot_obat_id,
        //     'satuan_obat_id' => $request->satuan_obat_id,
        //     'komposisi_obat' => $request->komposisi_obat,
        //     'created_by' => auth()->user()->id,
        //     'updated_by' => auth()->user()->id,
        // ]);
        $data = $request->except('_token');
        $harga = str_replace('.','',$request->harga);
        $harga = str_replace(',','.',$harga);
        $data['harga'] = (float)$harga;
        $data['created_by']=auth()->user()->id;
        $data['updated_by']=auth()->user()->id;
        if (Obat::create($data)) {
            return redirect('/data/obats')->with('message', 'Berhasil Menambahkan Data Obat');
        }

    }

    public function ubahobats($id)
    {

        $obat = Obat::find($id);
        $bobotobat = BobotObat::all();
        $golonganobat = GolonganObat::all();
        $namaobat = NamaObat::all();
        $satuanobat = SatuanObat::all();
        return view('petugas.obat.ubah_obats', compact('obat', 'bobotobat', 'golonganobat', 'namaobat', 'satuanobat'));
    }

    function changeobats(Request $request, $id) {
        $data = $request->except('_token');
        $data['updated_by']=auth()->user()->id;
        $harga = str_replace('.','',$request->harga);
        $harga = str_replace(',','.',$harga);
        $data['harga'] = (float)$harga;
        $data['is_antibiotik'] = $request->is_antibiotik??0;
        $data['is_sedatif'] = $request->is_sedatif??0;
        if (Obat::where('id',$id)->update($data)) {
            return redirect('/data/obats')->with('message', 'Berhasil Mengubah Data Obat!');
        }

        
    }

    public function modalObat($id)
    {
        $data['obat'] = Obat::find($id);

        return view('component/detail_obat', $data);
    }

   
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    

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
