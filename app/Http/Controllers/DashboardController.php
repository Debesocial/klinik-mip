<?php

namespace App\Http\Controllers;

use App\Models\InstruksiDokter;
use App\Models\IzinBerobat;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Level;
use App\Models\McuAwal;
use App\Models\McuLanjutan;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\PemantauanCovid;
use App\Models\PemeriksaanCovid;
use App\Models\RawatInap;
use App\Models\RawatJalan;
use App\Models\TandaVital;
use App\Models\TestUrin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $data['total_pasien'] = Pasien::count();
        // $data['pasien_per_bulan'] = Pasien::selectRaw('count(id) as total_bulan, SUM(COUNT(id)) OVER (ORDER BY DATE_FORMAT(created_at, "%Y-%m")) AS total, DATE_FORMAT(created_at, "%Y-%m") as tanggal')->groupByRaw("DATE_FORMAT(created_at, '%Y-%m')")->orderByRaw("DATE_FORMAT(created_at, '%Y-%m')")->get();
        $data['pasien_per_bulan'] = DB::table('pasiens as p1')
        ->selectRaw('COUNT(p1.id) as count, DATE_FORMAT(p1.created_at, "%Y-%m") as tanggal')
        ->selectSub(function ($query) {
            $query->from('pasiens as p2')
                ->selectRaw('COUNT(p2.id)')
                ->whereRaw('DATE_FORMAT(p2.created_at, "%Y-%m") <= DATE_FORMAT(p1.created_at, "%Y-%m")');
        }, 'total')
        ->groupBy(DB::raw('DATE_FORMAT(p1.created_at, "%Y-%m")'))
        ->orderBy(DB::raw('DATE_FORMAT(p1.created_at, "%Y-%m")'))
        ->get();
        $data['pasien_masih_rawat_inap'] = RawatInap::where('berakhir_rawat',null)->with(['pasien'])->get();
        $data['tanda_vital_hari_ini'] = TandaVital::whereDate('created_at', Carbon::today())->with(['rawatinap','rawatinap.pasien'])->get();
        $data['total_rawat_jalan']= RawatJalan::count();
        $rawat_jalan_per_bulan = RawatJalan::selectRaw('count(id) as total, DATE_FORMAT(tanggal_berobat, "%Y-%m") as bulan')->groupByRaw("DATE_FORMAT(tanggal_berobat, '%Y-%m')")->orderByRaw("DATE_FORMAT(tanggal_berobat, '%Y-%m')")->get();
        $rawat_inap_per_bulan = RawatInap::selectRaw('count(id) as total, DATE_FORMAT(mulai_rawat, "%Y-%m") as bulan')->groupByRaw("DATE_FORMAT(mulai_rawat, '%Y-%m')")->orderByRaw("DATE_FORMAT(mulai_rawat, '%Y-%m')")->get();
        $mcu_awal_per_bulan = McuAwal::selectRaw('count(id) as total, DATE_FORMAT(created_at, "%Y-%m") as bulan')->groupByRaw("DATE_FORMAT(created_at, '%Y-%m')")->orderByRaw("DATE_FORMAT(created_at, '%Y-%m')")->get();
        $mcu_lanjut_per_bulan = McuLanjutan::selectRaw('count(id) as total, DATE_FORMAT(tanggal_pemeriksaan, "%Y-%m") as bulan')->groupByRaw("DATE_FORMAT(tanggal_pemeriksaan, '%Y-%m')")->orderByRaw("DATE_FORMAT(tanggal_pemeriksaan, '%Y-%m')")->get();
        $narkoba_per_bulan = TestUrin::selectRaw('count(id) as total, DATE_FORMAT(created_at, "%Y-%m") as bulan')->groupByRaw("DATE_FORMAT(created_at, '%Y-%m')")->orderByRaw("DATE_FORMAT(created_at, '%Y-%m')")->get();
        $data['rawat_jalan_per_bulan'] = $rawat_jalan_per_bulan;
        $kunjungan = $this->totalKunjungan([$rawat_inap_per_bulan, $rawat_jalan_per_bulan, $mcu_awal_per_bulan, $mcu_lanjut_per_bulan,$narkoba_per_bulan]);
        $data['total_kunjungan'] = $kunjungan[1];
        $data['kunjungan_perbulan'] = $kunjungan[0];
        $data['jadwal'] = Jadwal::with(['user'])->get();
        $data['resep'] = $this->antrianResep();
        $data['delivered_resep'] = $this->deliveredResep();
        $data['obat'] = Obat::with(['satuan_obat'])->get();
        return view('index', $data);
    }


    public function totalKunjungan($data)
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

    function antrianResep(){
        $rawat_inap = RawatInap::with(['pasien'])->where('is_delivered',0)->get();
        $rawat_jalan = RawatJalan::with(['pasien'])->where('is_delivered',0)->get();
        $instruksi = InstruksiDokter::with(['rawatinap', 'rawatinap.pasien'])->where('is_delivered',0)->get();
        $vital = TandaVital::with(['rawatinap','rawatinap.pasien'])->where('is_delivered',0)->get();

        return ['resep_inap'=>$rawat_inap,'resep_jalan'=>$rawat_jalan, 'resep_instruksi'=>$instruksi,'resep_vital'=>$vital];
    }
    function deliveredResep(){
        $rawat_inap = RawatInap::with(['pasien'])->where('is_delivered',1)->whereDate('delivered_at', date('Y-m-d'))->get();
        $rawat_jalan = RawatJalan::with(['pasien'])->where('is_delivered',1)->whereDate('delivered_at', date('Y-m-d'))->get();
        $instruksi = InstruksiDokter::with(['rawatinap', 'rawatinap.pasien'])->where('is_delivered',1)->whereDate('delivered_at', date('Y-m-d'))->get();
        $vital = TandaVital::with(['rawatinap','rawatinap.pasien'])->where('is_delivered',1)->whereDate('delivered_at', date('Y-m-d'))->get();

        return ['resep_inap'=>$rawat_inap,'resep_jalan'=>$rawat_jalan, 'resep_instruksi'=>$instruksi,'resep_vital'=>$vital];
    }

    function serahkanobat(Request $request,$jenis,$id) {
    
        if ($jenis=='inap') {
            $query = RawatInap::where('id',$id);
        }elseif ($jenis =='jalan') {
            $query = RawatJalan::where('id',$id);
        }elseif ($jenis == 'instruksi') {
           $query = InstruksiDokter::where('id',$id);
        }elseif ($jenis =='vital') {
            $query = TandaVital::where('id',$id);
        }

        $query = $query->update([
            'is_delivered'=>1,'catatan_resep'=>$request->catatan_resep, 
            'delivered_at'=>date('Y-m-d H:i:s'),
            'need_approve_resep'=>$request->need_approve_resep
        ]);
        return redirect('/');
    }
}
