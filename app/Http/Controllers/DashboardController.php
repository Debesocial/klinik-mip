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
    public function index() {

        $user = User::count();
        $jadwal = Jadwal::all();
        $level = Level::all();
        $pasien= Pasien::count();
        $kategori = Pasien::where("kategori_pasien_id", "1")->count();
        $mitra = Pasien::where("kategori_pasien_id", "2")->orWhere("kategori_pasien_id", "3")->count();
        $narkoba = TestUrin::count();
        $periksacovid = PemeriksaanCovid::count();
        $pantaucovid = PemantauanCovid::count();
        $tanda = TandaVital::count();
        $jalan = RawatJalan::count();
        $inap = RawatInap::count();
        $izinberobat = IzinBerobat::count();
        
        return view('index', compact('user', 'jadwal', 'level', 'pasien', 'kategori', 'mitra', 'narkoba', 'periksacovid', 'pantaucovid', 'tanda', 'jalan'));
    }

}
