<?php

namespace App\Http\Controllers;

use App\Models\BobotObat;
use App\Http\Requests\StoreBobotObatRequest;
use App\Http\Requests\UpdateBobotObatRequest;
use Illuminate\Http\Request;

class BobotObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bobotobat()
    {
        $bobotobat = BobotObat::all();
        return view('petugas.superadmin.bobot_obat')->with('bobotobat', $bobotobat);
    }

    public function addbobotobat()
    {
        return view('petugas.superadmin.add_bobot_obat');
    }

    public function tambahbobotobat(Request $request)
    {
        $validatedData = $request->validate([
            'bobot_obat' => 'required'
        ]);

        BobotObat::create([
            'bobot_obat' => $request->bobot_obat,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/bobot/obat')->with('message', 'Sukses Menambah Bobot Obat!');
    }

    public function ubahbobotobat($id)
    {
        $bobotobat = BobotObat::find($id);
        return view('petugas.superadmin.ubah_bobot_obat', compact('bobotobat')); 
    }

    function changebobotobat(Request $request, $id) {
        $bobotobat = BobotObat::find($id);
        $bobotobat->bobot_obat = $request->input('bobot_obat');
        $bobotobat->update();

        return redirect('/bobot/obat')->with('message', 'Sukses Menambah Bobot Obat!');
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
     * @param  \App\Http\Requests\StoreBobotObatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBobotObatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BobotObat  $bobotObat
     * @return \Illuminate\Http\Response
     */
    public function show(BobotObat $bobotObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BobotObat  $bobotObat
     * @return \Illuminate\Http\Response
     */
    public function edit(BobotObat $bobotObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBobotObatRequest  $request
     * @param  \App\Models\BobotObat  $bobotObat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBobotObatRequest $request, BobotObat $bobotObat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BobotObat  $bobotObat
     * @return \Illuminate\Http\Response
     */
    public function destroy(BobotObat $bobotObat)
    {
        //
    }
}
