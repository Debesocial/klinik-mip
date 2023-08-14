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

    public function halamanTambahMcuAwal(Request $request)
    {
        $data['pasien_id'] = Pasien::with(['perusahaan', 'divisi', 'jabatan', 'keluarga', 'kategori'])->where('id_rekam_medis', '!=', 'null')->get();
        $data['hasilrekomendasi'] = hasilRekomendasi();
        $data['selected_pasien'] = $request->user;
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

        // hapus dokumen ada yang berubah
        $currDok = McuAwal::select('dokumen')->where('id',$id)->get()[0]->dokumen;
        $currDok = json_decode($currDok);
        if ($currDok) {
            foreach ($currDok as $key) {
                //hapus yang tidak ada
                if (!in_array($key,json_decode($request->old_dokumen))) {
                    $path = parse_url('pemeriksaan/mcuAwal/'.$key);
                    File::delete(public_path($path['path']));
                }
            }
        }
        $dokumen = json_decode($request->old_dokumen);

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            foreach ($file as $val) {
                $filename = time() . '_' . $val->getClientOriginalName();
                $dokumen[] = $filename;
                $val->move('pemeriksaan/mcuAwal', $filename); 
            }
        }
        $data['dokumen']=json_encode($dokumen);
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
    public function halamanTambahMcuLanjutan(Request $request)
    {
        $data['pasien_id'] = Pasien::with(['perusahaan', 'divisi', 'jabatan', 'keluarga', 'kategori'])->where('id_rekam_medis', '!=', 'null')->get();
        $jenismcu = [(object)['id' => 1, 'jenis' => 'Akhir'], (object)['id' => 2, 'jenis' => 'Berkala'], (object)['id' => 3, 'jenis' => 'Khusus']];
        $data['jenismcu'] = $jenismcu;
        $data['selected_pasien'] = $request->user;
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

        $dokumen = [];
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            foreach ($file as $val) {
                $filename = time() . '_' . $val->getClientOriginalName();
                $dokumen[] = $filename;
                $val->move('pemeriksaan/mcuLanjut', $filename); 
            }
           
        } 
        $data['dokumen']=json_encode($dokumen);

        $save = McuLanjutan::create($data);
        if ($save) {
            if ($request->status == 2 || $request->status == 3) {
                $all_hasil = json_decode(json_encode(hasilRekomendasi()),true);
                $id_hasil = $request->status;
                // dd($id_hasil);
                $hasil = array_values(array_filter($all_hasil, function ($arr) use ($id_hasil){
                    return $arr['id'] == $id_hasil;
                }))[0];
                return redirect("mcu/lanjutan/$save->id")->with('rujuk', ['Berhasil menambahkan MCU '. cekMcu($data['jenis_mcu']), 'Hasil rekomendasi adalah <b>'.$hasil['nama'].'</b> <br> Apakah anda ingin membuat <b>surat rujukan</b> ?'] );
            }
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

        // hapus dokumen ada yang berubah
        $currDok = McuLanjutan::select('dokumen')->where('id',$id)->get()[0]->dokumen;
        $currDok = json_decode($currDok);
        if ($currDok) {
            foreach ($currDok as $key) {
                //hapus yang tidak ada
                if (!in_array($key,json_decode($request->old_dokumen))) {
                    $path = parse_url('pemeriksaan/mcuLanjut/'.$key);
                    File::delete(public_path($path['path']));
                }
            }
        }
        $dokumen = json_decode($request->old_dokumen);
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            foreach ($file as $val) {
                $filename = time() . '_' . $val->getClientOriginalName();
                $dokumen[] = $filename;
                $val->move('pemeriksaan/mcuLanjut', $filename); 
            }
        }
        
        $data['dokumen']=json_encode($dokumen);
        if (McuLanjutan::where('id', $id)->update($data)) {
            return redirect("mcu/lanjutan/$id")->with('message', 'Berhasil Mengubah MCU ' . cekMcu($data['jenis_mcu']));
        };
    }
}
