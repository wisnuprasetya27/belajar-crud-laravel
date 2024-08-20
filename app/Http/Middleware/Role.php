<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    function handle($request, Closure $next, ...$roles)
    {
        if(getAuth() == '0'){
            return redirect('/login');
        }
        else{

            foreach ($roles as $role) 
            {
                if ($role == 'all'){
                    return $next($request);
                }
                else if (($role == 'admin' && getAuth('role') == 'admin')
                || ($role == 'mahasiswa' && getAuth('role') == 'mahasiswa')
                || ($role == 'dosen' && getAuth('role') == 'dosen')){
                    return $next($request);
                }
            }

            return redirect('/404');
        }
    }
}
