<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function postlogin(Request $request)
    {
      // echo "$request->email.$request->password "; die;
    	if(Auth::attempt($request->only('name','password'))){
            $akun = DB::table('users')->where('name', $request->name)->first();
            //dd($akun);
            if($akun->role =='admin'){
                Auth::guard('admin')->LoginUsingId($akun->id);
                return redirect('/admin')->with('sukses','Anda Berhasil Login');
            } else if($akun->role =='Kepala Laboratorium'){
                Auth::guard('kalab')->LoginUsingId($akun->id);
                return redirect('/berandakalab')->with('sukses','Anda Berhasil Login');
            }
    	}return redirect('/dashboard');
    }
    public function logout()
    {
        if(Auth::guard('Administrator')->check()){
            Auth::guard('Administrator')->logout();
        } else if(Auth::guard('kalab')->check()){
            Auth::guard('kalab')->logout();
        } else if(Auth::guard('dosen')->check()){
            Auth::guard('dosen')->logout();
        } else if(Auth::guard('aslab')->check()){
            Auth::guard('aslab')->logout();
        } else if(Auth::guard('asprak')->check()){
            Auth::guard('asprak')->logout();
        } else if(Auth::guard('praktikan')->check()){
            Auth::guard('praktikan')->logout();
        }
     return redirect('login')->with('sukses','Anda Telah Logout');
    }

}
