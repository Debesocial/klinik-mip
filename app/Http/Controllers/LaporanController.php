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
        if ($request->jenis=='bulanan') {
            $rawat_jalan_per_bulan = RawatJalan::selectRaw('count(id) as total, DATE_FORMAT(tanggal_berobat, "%Y-%m") as bulan')
            ->groupByRaw("DATE_FORMAT(tanggal_berobat, '%Y-%m')")
            ->orderByRaw("DATE_FORMAT(tanggal_berobat, '%Y-%m')")
            ->where('is_kecelakaan', 0)
            ->get();
            $rawat_inap_per_bulan = RawatInap::selectRaw('count(id) as total, DATE_FORMAT(mulai_rawat, "%Y-%m") as bulan')
            ->groupByRaw("DATE_FORMAT(mulai_rawat, '%Y-%m')")
            ->orderByRaw("DATE_FORMAT(mulai_rawat, '%Y-%m')")
            ->where('is_kecelakaan', 0)
            ->get();
            $total_pekerja_sakit = $this->totalPerbulan([$rawat_inap_per_bulan, $rawat_jalan_per_bulan]);
            $data['set_year'] = $request->year;
            $data['total'] = $total_pekerja_sakit;
        }else if($request->jenis=='harian'){
            $rawat_jalan_per_hari = RawatJalan::selectRaw('count(id) as total, DATE_FORMAT(tanggal_berobat, "%d") as hari')
            ->groupByRaw("DATE_FORMAT(tanggal_berobat, '%d')")
            ->orderByRaw("DATE_FORMAT(tanggal_berobat, '%d')")
            ->where('is_kecelakaan', 0)
            ->get();
            $rawat_inap_per_hari = RawatInap::selectRaw('count(id) as total, DATE_FORMAT(mulai_rawat, "%d") as hari')
            ->groupByRaw("DATE_FORMAT(mulai_rawat, '%d')")
            ->orderByRaw("DATE_FORMAT(mulai_rawat, '%d')")
            ->where('is_kecelakaan', 0)
            ->get();
            $total_pekerja_sakit = $this->totalPerbulan([$rawat_inap_per_hari, $rawat_jalan_per_hari]);
            $data['start'] = $request->start;
            $data['end'] = $request->end;
            $data['total'] = $total_pekerja_sakit;
        }
        $data['color'] = $color;

        return view('component/laporan_pekerja_sakit', $data);
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
