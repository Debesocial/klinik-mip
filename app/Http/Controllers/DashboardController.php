<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Level;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $user = User::where("level_id", "1")->get();
        $jadwal = Jadwal::all();
        $level = Level::all();
        
        return view('index', compact('user', 'jadwal', 'level'));
    }

    public function indexperawat() {

        $users = User::where("level_id", "3")->get();
        $jadwal = Jadwal::all();
        $level = Level::all();
        
        return view('perawat', compact('user', 'jadwal', 'level'));
    }
}
