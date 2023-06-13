<?php

namespace App\Http\Controllers;

use App\Models\IzinBerobat;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Level;
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
        
        $data['pasien_per_bulan'] = DB::select('SELECT count(p1.id), DATE_FORMAT(p1.created_at, "%Y-%m") as tanggal, 
        (select count(p2.id) from pasiens p2 where DATE_FORMAT(p2.created_at, "%Y-%m") <= DATE_FORMAT(p1.created_at, "%Y-%m")) as total 
        FROM pasiens p1 
        GROUP BY DATE_FORMAT(p1.created_at, "%Y-%m") 
        ORDER BY DATE_FORMAT(p1.created_at, "%Y-%m")');
        $data['pasien_masih_rawat_inap'] = RawatInap::where('berakhir_rawat',null)->with(['pasien'])->get();
        $data['tanda_vital_hari_ini'] = TandaVital::whereDate('created_at', Carbon::today())->with(['rawatinap','rawatinap.pasien'])->get();
        $data['total_rawat_jalan']= RawatJalan::count();
        $data['rawat_jalan_per_bulan'] = RawatJalan::selectRaw('count(id) as total, DATE_FORMAT(tanggal_berobat, "%Y-%m") as bulan')->groupByRaw("DATE_FORMAT(tanggal_berobat, '%Y-%m')")->orderByRaw("DATE_FORMAT(tanggal_berobat, '%Y-%m')")->get();
        return view('index', $data);
    }
}
