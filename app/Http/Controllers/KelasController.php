<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::with(['mata_kuliah', 'dosen'])->get();

        return view('v_kelas', [
            'data' => $data,
        ]);
    }

    public function modal_tambah()
    {
        return view('v_kelas_modal', [
            'modal'         => 'tambah',
            'mata_kuliah'   => MataKuliah::all(),
            'dosen'         => User::where('role', 'dosen')->get(),
        ]);
    }

    public function tambah_proses(Request $request)
    {
        #==cek
        $cek = Kelas::where([
            ['mata_kuliah_id', '=', $request->mata_kuliah_id],
            ['dosen_id', '=', $request->dosen_id],
            ['kelas', '=', $request->kelas],
        ])->first();

        if($cek != ''){
            \sesAlert('danger', 'Kelas telah terdaftar di database');
            return \back();
        }
        
        $sql = Kelas::create($request->all());

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
        $id   = $request->id;
        $data = Kelas::where('id', $id)->first();

        if($data == null){
            return view('modal/v_modal_404');
            die;
        }
        
        return view('v_kelas_modal', [
            'modal'         => 'edit',
            'row'           => $data,
            'mata_kuliah'   => MataKuliah::all(),
            'dosen'         => User::where('role', 'dosen')->get(),
        ]);
    }

    public function edit_proses(Request $request)
    {
        $id = $request->id;

        #==cek
        $cek = Kelas::where([
            ['mata_kuliah_id', '=', $request->mata_kuliah_id],
            ['dosen_id', '=', $request->dosen_id],
            ['kelas', '=', $request->kelas],
            ['id', '<>', $id],
        ])->first();

        if($cek != null){
            \sesAlert('danger', 'Kelas telah terdaftar di database');
            return \back();
        }

        $sql = Kelas::find($id);
        $sql->update($request->all());

        if($sql){
            \sesAlert('success', 'Edit data berhasil');
        }
        else{
            \sesAlert('danger', 'Internal server error: '.$sql);
        }

        return \back();
    }

    public function hapus_proses(Request $request)
    {
        DB::table('kelas')
        ->where('id', $request->id)
        ->delete();

        DB::table('kelas_mahasiswa')
        ->where('kelas_id', $request->id)
        ->delete();

        \sesAlert('success', 'Hapus data berhasil');
        return \back();
    }
}
