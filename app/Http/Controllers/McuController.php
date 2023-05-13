<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\HasilPemantauan;
use App\Models\McuAwal;
use App\Models\McuLanjutan;

class McuController extends Controller
{
    public function index()
    {
        $data['mcuawal'] = McuAwal::all();
        $data['mculanjutan'] = McuLanjutan::all();
        return view('petugas.pemeriksaan.data_mcu', $data);
    }

    /**Mcu Awal */

    public function halamanTambahMcuAwal()
    {
        $data['pasien_id'] = Pasien::all();
        $data['hasilpemantauan'] =  HasilPemantauan::all();
        return view('petugas.pemeriksaan.add_mcu_awal', $data);
    }

    public function halamanUbahMcuAwal($id)
    {
        $data['hasilpemantauan'] = HasilPemantauan::all();
        $data['mcuawal'] = McuAwal::find($id);
        return view('petugas.pemeriksaan.ubah_mcu_awal', $data);
    }

    public function ubahMcuAwal(Request $request, $id)
    {
        $data = $request->except(['_token', 'pasien_id']);
        $data['updated_by'] = auth()->user()->id;

        if (McuAwal::where('id', $id)->update($data)) {
            return redirect("mcu/$id")->with('message', 'Berhasil Mengubah MCU Awal');
        };
    }

    public function detailMcuAwal($id)
    {
        $data['mcuawal'] = McuAwal::find($id);

        return view('petugas.pemeriksaan.view_mcu_awal', $data);
    }


    /**Mcu Lanjutan */
    public function halamanTambahMcuLanjutan()
    {
        $data['pasien_id'] = Pasien::all();
        $jenismcu = [(object)['id' => 1, 'jenis' => 'Akhir'], (object)['id' => 2, 'jenis' => 'Berkala'], (object)['id' => 3, 'jenis' => 'Khusus']];
        $data['jenismcu'] = $jenismcu;
        return view('petugas.pemeriksaan.add_mcu_lanjutan', $data);
    }
    public function detailMcuLanjutan($id)
    {
        $data['mculanjutan'] = McuLanjutan::find($id);

        return view('petugas.pemeriksaan.view_mcu_lanjutan', $data);
    }

    public function tambahMcuLanjutan(Request $request)
    {
        $data = $request->except('_token');
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;
        $save = McuLanjutan::create($data);
        if ($save) {
            return redirect("/mcu/lanjutan/$save->id")->with('message', 'Berhasil Menambah MCU ' . cekMcu($data['jenis_mcu']));
        }
    }

    public function halamanUbahMcuLanjutan($id)
    {
        $data['mculanjutan'] = McuLanjutan::find($id);
        $jenismcu = [(object)['id' => 1, 'jenis' => 'Akhir'], (object)['id' => 2, 'jenis' => 'Berkala'], (object)['id' => 3, 'jenis' => 'Khusus']];
        $data['jenismcu'] = $jenismcu;
        return view('petugas.pemeriksaan.ubah_mcu_lanjutan', $data);
    }

    public function ubahMcuLanjutan(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_by'] = auth()->user()->id;

        if (McuLanjutan::where('id', $id)->update($data)) {
            return redirect("mcu/lanjutan/$id")->with('message', 'Berhasil Mengubah MCU ' . cekMcu($data['jenis_mcu']));
        };
    }
}
