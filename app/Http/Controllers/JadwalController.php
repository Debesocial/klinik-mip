<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function ubahJadwal(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->except(['_tokens']);
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;

        $save = Jadwal::create($data);
        if ($save) {
            $tempJadwal = $user->jadwal_id;
            $user->jadwal_id = $save->id;
            $user->update();
            Jadwal::where('id','=',$tempJadwal)->delete();
            return redirect("/ubah/data/user/$id")->with('message', 'Berhasil Mengubah Jadwal Petugas!');
        }
    }
}
