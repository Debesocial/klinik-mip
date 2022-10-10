<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Level;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $user = User::all();
        $jadwal = Jadwal::all();
        $level = Level::all();
        
        return view('index', compact('user', 'jadwal', 'level'));
    }
}
