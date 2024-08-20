<?php
#================ CATATAN PENTING: setelah membuat helper jangan lupa di dump dengan terminal -> composer dump-autoload
use App\Models\User;

if (!function_exists('getAuth')) 
{
	function getAuth($x="")
	{
        if(!empty($_COOKIE[isPengaturan('cookie')]))
        {
            $cookie 		= $_COOKIE[isPengaturan('cookie')];
			$cookieData 	= explode('|', $cookie);
			$cookieId  		= $cookieData[0]; // id
			$cookieRole  	= $cookieData[1]; // role
			$cookieNama  	= $cookieData[2]; // name

            $login = User::where('id', $cookieId)->first();
            $login = $login == '' ? '0' : $login;

            if($login == '0'){
                $d = '0';
            }
            else{

                #==perbarui cookie setiap kali akses aplikasi
                // $value = $login->user_id.'|'.$login->role.'|'.$login->name;
                // $time_cookie = time() + (60 * 60 * 24 * 1); #== detik, menit, jam, hari
                // setcookie($cookie, $value, $time_cookie, '/', isPengaturan('domain_main'));

                if($x == 'id'){
                    $d = $login->id;
                }
                else if($x == 'role'){
                    $d = $cookieRole;
                }
                else if($x == 'nama'){
                    $d = $cookieNama;
                }
                else if($x == 'profil'){
                    $d = $login;
                }
                else{
                    $d = '1';
                }
            }
        }
        else{
            $d = '0';
        }

        return $d;
    }
}