<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Level;
use App\Models\Pasien;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $user = User::all();
        $jadwal = Jadwal::all();
        $level = Level::all();
        $pasien= Pasien::count();
        $kategori = Pasien::where("kategori_pasien_id", "1")->count();
        $mitra = Pasien::where("kategori_pasien_id", "2")->orWhere("kategori_pasien_id", "3")->count();
        
        return view('index', compact('user', 'jadwal', 'level', 'pasien', 'kategori', 'mitra'));
    }

}
