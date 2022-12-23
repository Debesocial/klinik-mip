<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Level;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ubahpassword($id){
        
        $user = User::where('id',$id)->first();
        
        
        return view('petugas.profile.ubah_password', compact('user'));
    }


    public function changepassword(Request $request, $id){
        $password1 = $request->current_password;
        
        $user = User::where("id", $id)->first();
        
        if (password_verify($password1, $user->password)) {
            
                //Change Password
                $user = DB::table('users')->where('id', $id)->update([
                
                    
                    'password' => Hash::make($request->get('new_password'))
                    
                ]);
                 
                return redirect()->back()->with("success","Kata Sandi Berhasil Di Ubah !");
        
        }
        
        else{
            // The passwords matches
        return redirect()->back()->with("error","Kata Sandi yang dimasukkan tidak sesuai. Coba Lagi.");

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ubahprofile($id)
    {
        $user = User::find($id);
        $level = Level::all();
        return view('petugas.profile.ubah_profile', compact('user', 'level'));
    }

    function changeprofile(Request $request, $id) {
        // dd($request->input('senin'));
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->telp = $request->input('telp');
        $user->level_id = $request->input('level_id');
        $user->status = $request->input('status');
        $user->update();


        if ($user) {
            return redirect()->back()->with("success","Profile Berhasil Di Ubah !");
            
        }   
        else{
            // The passwords matches
        return redirect()->back()->with("error","Data yang dimasukkan tidak sesuai. Coba Lagi.");

        }
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
