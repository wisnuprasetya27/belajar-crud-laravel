<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\KelasMahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $kelas_id = $request->kelas_id;

        #==cek
        $kelas = Kelas::with(['mata_kuliah', 'dosen'])
        ->where('id', $kelas_id)
        ->first();

        if($kelas == ''){
            return \redirect('404');
        }

        $data = KelasMahasiswa::with(['mahasiswa'])->where('kelas_id', $kelas_id)->get();

        return view('v_kelas_mahasiswa', [
            'data'      => $data,
            'kelas_id'  => $kelas_id,
            'kelas'     => $kelas,
        ]);
    }

    public function modal_tambah(Request $request)
    {
        $kelas_id = $request->kelas_id;

        return view('v_kelas_mahasiswa_modal', [
            'modal' => 'tambah',
            'kelas_id' => $kelas_id
        ]);
    }

    public function tambah_proses(Request $request)
    {
        #==cek
        $mahasiswa = User::where([
            ['username', '=', $request->nim],
            ['role', '=', 'mahasiswa']
        ])->first();

        if($mahasiswa == ''){
            \sesAlert('danger', 'Mahasiswa tidak terdaftar di database');
            return \back();
        }

        #==cek
        $cek = KelasMahasiswa::where([
            ['kelas_id', '=', $request->kelas_id],
            ['mahasiswa_id', '=', $mahasiswa->id],
        ])->first();

        if($cek != ''){
            \sesAlert('danger', 'Mahasiswa telah terdaftar di kelas');
            return \back();
        }
        
        #==proses update
        $request['mahasiswa_id'] = $mahasiswa->id;
        $sql = KelasMahasiswa::create($request->all());

        if($sql){
            \sesAlert('success', 'Tambah data berhasil');
        }
        else{
            \sesAlert('danger', 'Internal server error: '.$sql);
        }
        
        return \back();
    }

    public function edit_nilai_proses(Request $request)
    {
        $id     = $request->id;
        $nilai  = $request->nilai;

        $sql = DB::table('kelas_mahasiswa')
        ->where('id', $id)
        ->update(['nilai' => $nilai]);

        if($sql){
            echo 'success';
        }
        else{
            echo $sql;
        }
    }

    public function hapus_proses(Request $request)
    {
        DB::table('kelas_mahasiswa')
        ->where('id', $request->id)
        ->delete();

        \sesAlert('success', 'Hapus data berhasil');
        return \back();
    }
}
