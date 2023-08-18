<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\NamaPenyakit;
use App\Models\SubKlasifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NamaPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function namapenyakit()
    {
        // $namapenyakit = NamaPenyakit::with(['sub_klasifikasi', 'category', 'sub_klasifikasi.klasifikasi_penyakit'])->get();
        
        return view('petugas.superadmin.nama_penyakit');
    }

    function getPenyakit(Request $request) {
        $length = $request->input('length');
        $start = $request->input('start');
        $keyword = $request->input('search')['value'];
        $draw = $request->input('draw');
        $orderColumn = $request->input('order')[0]['column'];
        $orderDir = $request->input('order')[0]['dir'];

        $namapenyakit = DB::table('nama_penyakits')->selectRaw('nama_penyakits.id as id, nama_penyakits.primer as primer, sub_klasifikasis.nama_penyakit as sub, klasifikasi_penyakits.klasifikasi_penyakit as klasifikasi, categories.nama_penyakit as category')
        ->join('sub_klasifikasis', 'sub_klasifikasis.id', '=', 'nama_penyakits.sub_klasifikasi_id')
        ->join('klasifikasi_penyakits', 'klasifikasi_penyakits.id', '=' , 'sub_klasifikasis.klasifikasi_penyakit_id')
        ->join('categories', 'categories.id', '=', 'nama_penyakits.category_id')
        ->where('primer','!=', '')
        ->offset($start)
        ->limit($length);
        if ($keyword) {
            $namapenyakit = $namapenyakit->where('primer', 'like', '%'.$keyword.'%');
        }
        switch ($orderColumn) {
            case 0:
                $namapenyakit = $namapenyakit->orderBy('nama_penyakits.primer', $orderDir);
                break;
            case 1:
                $namapenyakit = $namapenyakit->orderBy('sub_klasifikasis.nama_penyakit', $orderDir);
                break;
            case 2:
                $namapenyakit = $namapenyakit->orderBy('categories.nama_penyakit', $orderDir);
                break;
            case 3:
                $namapenyakit = $namapenyakit->orderBy('klasifikasi_penyakits.klasifikasi_penyakit', $orderDir);
                break;
        }
        $namapenyakit = $namapenyakit->get();
        //total record
        if ($keyword) {
            $total = Namapenyakit::where('primer', 'like', '%'.$keyword.'%')->where('primer','!=', '')->count();
        }else{
            $total = NamaPenyakit::where('primer','!=', '')->count();
        }
        $data = [
            "recordsTotal"=> $total,
            "recordsFiltered"=> $total,
            "draw"=>$draw,
        ];
        $data['data'] = $namapenyakit;

        return json_encode($data);
    }

    public function addnamapenyakit()
    {
        $namapenyakit = NamaPenyakit::all();
        $subklasifikasi = SubKlasifikasi::all();
        $category = Category::get();

        return view('petugas.superadmin.add_nama_penyakit', compact('namapenyakit', 'subklasifikasi', 'category'));
    }

    public function tambahnamapenyakit(Request $request)
    {
        
        $validatedData = $request->validate([
            'primer' => 'required',
            'sekunder' => '',
            'sub_klasifikasi_id' => 'required'
        ]);

        NamaPenyakit::create([
            'primer' => $request->primer,
            'sub_klasifikasi_id' => $request->sub_klasifikasi_id,
            'category_id' => $request->category_id,
            'pengertian' => $request->pengertian,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/nama/penyakit')->with('message', 'Berhasil Menambahkan Diagnosa!');
    }

    public function ubahnamapenyakit($id)
    {
        $namapenyakit = NamaPenyakit::find($id);
        $subklasifikasi = SubKlasifikasi::all();
        $category = Category::get();
        return view('petugas.superadmin.ubah_nama_penyakit', compact('namapenyakit', 'subklasifikasi','category')); 
    }

    function changenamapenyakit(Request $request, $id) {
        $namapenyakit = NamaPenyakit::find($id);
        $namapenyakit->primer = $request->input('primer');
        $namapenyakit->sekunder = $request->input('sekunder');
        $namapenyakit->sub_klasifikasi_id = $request->input('sub_klasifikasi_id'); 
        $namapenyakit->category_id = $request->input('category_id'); 
        $namapenyakit->pengertian = $request->input('pengertian'); 
        $namapenyakit->update();

        return redirect('/nama/penyakit')->with('message', 'Berhasil Mengubah Diagnosa!');
    }

    function cariPenyakit(Request $request) {
        $keyword = $request->input('keyword');
        if ($keyword) {
            $data = NamaPenyakit::with(['sub_klasifikasi','category', 'sub_klasifikasi.klasifikasi_penyakit'])->where('primer', 'like', '%'.$keyword.'%')->limit(100)->get();
        }

        if ($data->count() > 0 ) {
           $result = ['code' => 200, 'data'=>$data]; 
        }else{
            $result = ['code' => 404, 'msg'=>'Tidak ada hasil dengan kata kunci "'.$keyword.'"']; 
        }
        return json_encode($result);
    }
}
