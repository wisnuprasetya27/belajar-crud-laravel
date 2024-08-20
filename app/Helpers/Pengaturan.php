<?php
#================ CATATAN PENTING: setelah membuat helper jangan lupa di dump dengan terminal -> composer dump-autoload

use Illuminate\Support\Facades\Session;

if (!function_exists('isPengaturan')) 
{
	function isPengaturan($x="")
	{
        $d = '0';

        if($x == 'cookie'){
            $d = '__LOGIN_CRUD_LARAVEL__';
        }
        else if($x == 'nama_aplikasi'){
            $d = 'Belajar CRUD Laravel';
        }
        else if($x == 'copyright'){
            $d = 'Belajar';
        }
        else if($x == 'versi'){
            $d = '1.1';
        }
        else if($x == 'domain_main'){
            $d = '';
        }

        return $d;
    }
}


if (!function_exists('sesAlert')) 
{
	function sesAlert($status, $message)
	{
        Session::flash('alert-status', $status);
        Session::flash('alert-message', $message);
    }
}