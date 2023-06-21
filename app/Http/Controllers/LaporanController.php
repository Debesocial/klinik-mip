<?php

namespace App\Http\Controllers;

use App\Models\RawatInap;
use App\Models\RawatJalan;
use Illuminate\Http\Request;


class LaporanController extends Controller
{
   
    public function laporan()
    {
        return view('laporan/laporan');
    }

    public function pekerjaSakit(Request $request){
        $color = $request->color;
        $rawat_jalan_per_bulan = RawatJalan::selectRaw('count(id) as total, DATE_FORMAT(tanggal_berobat, "%Y-%m") as bulan')->groupByRaw("DATE_FORMAT(tanggal_berobat, '%Y-%m')")->orderByRaw("DATE_FORMAT(tanggal_berobat, '%Y-%m')")->get();
        $rawat_inap_kecelakaan_per_bulan = RawatInap::selectRaw('count(DISTINCT rawat_inaps.id) as total, DATE_FORMAT(mulai_rawat, "%Y-%m") as bulan')
        ->join('kecelakaan_kerjas','kecelakaan_kerjas.id_rekam_medis', '=', 'rawat_inaps.id')
        ->groupByRaw("DATE_FORMAT(mulai_rawat, '%Y-%m')")
        ->groupBy('rawat_inaps.id')
        ->orderByRaw("DATE_FORMAT(mulai_rawat, '%Y-%m')")
        ->where('kecelakaan_kerjas.rekam_medis','RI')
        ->get();
        $rawat_inap_per_bulan = RawatInap::selectRaw('count(id) as total, DATE_FORMAT(mulai_rawat, "%Y-%m") as bulan')
        ->groupByRaw("DATE_FORMAT(mulai_rawat, '%Y-%m')")
        ->orderByRaw("DATE_FORMAT(mulai_rawat, '%Y-%m')")
        ->get();
        return $rawat_inap_kecelakaan_per_bulan;
    }
    public function absenSakit(Request $request){
        $color = $request->color;
        return $color;
    }
    public function pak(Request $request){
        $color = $request->color;
        return $color;
    }
    public function totalPerbulan($data)
    {
        $kunjungan = [];
        $total = 0;
        foreach ($data as $datas ) {
            foreach($datas as $d){
                if (array_key_exists($d->bulan, $kunjungan)) {
                    $kunjungan[$d->bulan]->total = $kunjungan[$d->bulan]->total + $d->total;
                }else{
                    $kunjungan[$d->bulan] = $d;
                }
                $total = $total + $d->total;
            }
        }
        return([array_values($kunjungan), $total]);
        
    }
}
