<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\HasilPemantauan;
use App\Models\McuAwal;
use App\Models\McuLanjutan;
use Illuminate\Support\Facades\File;


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
        $data['pasien_id'] = Pasien::with(['perusahaan', 'divisi', 'jabatan', 'keluarga', 'kategori'])->get();
        $data['hasilrekomendasi'] = hasilRekomendasi();
        return view('petugas.pemeriksaan.add_mcu_awal', $data);
    }

    public function halamanUbahMcuAwal($id)
    {
        $data['hasilrekomendasi'] = hasilRekomendasi();

        $data['mcuawal'] = McuAwal::with(['pasien','pasien.perusahaan', 'pasien.divisi', 'pasien.jabatan', 'pasien.keluarga', 'pasien.kategori'])->find($id);
        return view('petugas.pemeriksaan.ubah_mcu_awal', $data);
    }

    public function ubahMcuAwal(Request $request, $id)
    {
        $data = $request->except(['_token', 'pasien_id','old_dokumen']);
        $data['updated_by'] = auth()->user()->id;
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();  
            $file->move('pemeriksaan/mcuAwal', $filename);
            if ($request->old_dokumen) {
                $path = parse_url('pemeriksaan/mcuAwal/'.$request->old_dokumen);
                File::delete(public_path($path['path']));
            }
            $data['dokumen']=$filename;
        }
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
        $data['pasien_id'] = Pasien::with(['perusahaan', 'divisi', 'jabatan', 'keluarga', 'kategori'])->get();
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
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('pemeriksaan/mcuLanjut', $filename);
        } else {
            $filename = '';
        }
        $data['dokumen']=$filename;
        $save = McuLanjutan::create($data);
        if ($save) {
            return redirect("/mcu/lanjutan/$save->id")->with('message', 'Berhasil Menambah MCU ' . cekMcu($data['jenis_mcu']));
        }
    }

    public function halamanUbahMcuLanjutan($id)
    {
        $data['mculanjutan'] = McuLanjutan::with(['pasien','pasien.perusahaan', 'pasien.divisi', 'pasien.jabatan', 'pasien.keluarga', 'pasien.kategori'])->find($id);
        $jenismcu = [(object)['id' => 1, 'jenis' => 'Akhir'], (object)['id' => 2, 'jenis' => 'Berkala'], (object)['id' => 3, 'jenis' => 'Khusus']];
        $data['jenismcu'] = $jenismcu;
        return view('petugas.pemeriksaan.ubah_mcu_lanjutan', $data);
    }

    public function ubahMcuLanjutan(Request $request, $id)
    {
        $data = $request->except(['_token','old_dokumen']);
        $data['updated_by'] = auth()->user()->id;
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();  
            $file->move('pemeriksaan/mcuLanjut', $filename);
            if ($request->old_dokumen) {
                $path = parse_url('pemeriksaan/mcuLanjut/'.$request->old_dokumen);
                File::delete(public_path($path['path']));
            }
            $data['dokumen']=$filename;
        }

        if (McuLanjutan::where('id', $id)->update($data)) {
            return redirect("mcu/lanjutan/$id")->with('message', 'Berhasil Mengubah MCU ' . cekMcu($data['jenis_mcu']));
        };
    }
}
