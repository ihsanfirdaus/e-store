<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\User;
use Auth;

class UserController extends Controller
{
    public function profilUser(Request $request)
    {
        // $user = Auth::user();
        
        return view('user.profil');
    }

    public function formAktivasiAkun(Request $request)
    {
       return view('user/aktivasi-akun');
    }

    public function aktivasiAkun(Request $request)
    {
        $username = $request->username;

        $getId = User::where('username',$username)->value('id');
        
        $user = User::find($getId);
        
        // validasi username terlebih dahulu
        $this->validateAkun($request);

        $user->status_akun = 1;

        if($user->save()) {
            return redirect(URL::previous())->with('success','Akun anda telah diaktifkan');
        }else{
            return redirect(URL::previous())->withInput($request->all());
        }
    }

    public function validateAkun(Request $request)
    {
        $request->validate([
            'username' => 'exists:users,username',
        ],[
            'username.exists' => 'Username ini tidak terdaftar'
        ]);
    }
}
