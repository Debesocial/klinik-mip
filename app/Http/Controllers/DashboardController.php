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

class DashboardController extends Controller
{
    public function index()
    {


        $data['total_pasien'] = Pasien::count();
        $data['pasien_per_bulan'] = Pasien::selectRaw('count(id) as total_bulan, SUM(COUNT(id)) OVER (ORDER BY DATE_FORMAT(created_at, "%Y-%m")) AS total, DATE_FORMAT(created_at, "%Y-%m") as tanggal')->groupByRaw("DATE_FORMAT(created_at, '%Y-%m')")->get();
        return view('index', $data);
    }
}
