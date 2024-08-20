<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->role;
        $data = User::where('role', $role)->get();

        return view('v_user', [
            'data'      => $data,
            'role'      => $role,
        ]);
    }

    public function modal_tambah(Request $request)
    {
        $role = $request->role;
        return view('v_user_modal', [
            'modal' => 'tambah',
            'role'  => $role,
        ]);
    }

    public function tambah_proses(Request $request)
    {
        #==cek username
        $cek = User::where('username', $request->username)->first();
        if($cek != ''){
            \sesAlert('danger', 'Username telah terdaftar di database');
            return \back();
        }
        
        $request['password'] = sha1(sha1($request['username']));
        $sql = User::create($request->all());

        if($sql){
            \sesAlert('success', 'Tambah data berhasil');
        }
        else{
            \sesAlert('danger', 'Internal server error: '.$sql);
        }
        
        return \back();
    }

    public function modal_edit(Request $request)
    {
        $id     = $request->id;
        $role   = $request->role;

        $data = User::where('id', $id)->first();

        if($data == null){
            return view('modal/v_modal_404');
            die;
        }
        
        return view('v_user_modal', [
            'modal' => 'edit',
            'row'   => $data,
            'role'  => $role,
        ]);
    }

    public function edit_proses(Request $request)
    {
        $id = $request->id;

        #==cek username
        $cek = User::where([
            ['username', '=', $request->username],
            ['id', '<>', $id],
        ])->first();

        if($cek != null){
            \sesAlert('danger', 'Username telah terdaftar di database');
            return \back();
        }

        $sql = User::find($id);
        $sql->update($request->all());

        if($sql){
            \sesAlert('success', 'Edit data berhasil');
        }
        else{
            \sesAlert('danger', 'Internal server error: '.$sql);
        }

        return \back();
    }
    

    public function reset_password_proses(Request $request)
    {
        DB::table('users')
        ->where('id', $request->id)
        ->update(['password' => $request->new_password]);

        \sesAlert('success', 'Reset password berhasil');
        return \back();
    }

    public function hapus_proses(Request $request)
    {
        if($request->id == \getAuth('id')){
            \sesAlert('danger', 'Anda tidak dapat menghapus akun anda sendiri');
            return \back();
        }

        DB::table('users')
        ->where('id', $request->id)
        ->delete();

        \sesAlert('success', 'Hapus data berhasil');
        return \back();
    }
}
