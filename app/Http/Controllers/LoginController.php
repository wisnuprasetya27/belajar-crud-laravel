<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index() 
    {
        if(\getAuth() != '0'){
            return redirect('/dashboard');
            die;
        }

        return view('v_login');
    }

    public function login_proses(Request $request)
    {
        $username = $request->username;
        $password = \sha1(\sha1(($request->password)));

        $data = User::where([
            'username'  => $username,
            'password'  => $password,
        ])->first();

        if($data != null)
        {
            $value = $data->id.'|'.$data->role.'|'.$data->nama;
            
			$time_cookie = time() + (60 * 60 * 24 * 1); #== detik, menit, jam, hari
			setcookie(isPengaturan('cookie'), $value, $time_cookie, '/', isPengaturan('domain_main'));

            return \redirect('dashboard');
        }
        else{

            \sesAlert('danger', 'Username atau password anda salah');
            return \redirect('login');
        }
    }
    
    public function logout_proses()
    {
        #==destroy all session
        Session::flush();

        setcookie(isPengaturan('cookie'), '', 0, '/', isPengaturan('domain_main'));
        return redirect('login');
    }
}
