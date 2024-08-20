<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MataKuliahController extends Controller
{
    public function index()
    {
        $data = MataKuliah::all();

        return view('v_mata_kuliah', [
            'data'      => $data,
        ]);
    }

    public function modal_tambah()
    {
        return view('v_mata_kuliah_modal', [
            'modal' => 'tambah',
        ]);
    }

    public function tambah_proses(Request $request)
    {
        #==cek kode
        $cek = MataKuliah::where('kode', $request->kode)->first();
        if($cek != ''){
            \sesAlert('danger', 'Kode telah terdaftar di database');
            return \back();
        }
        
        $sql = MataKuliah::create($request->all());

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
        $data = MataKuliah::where('id', $id)->first();

        if($data == null){
            return view('modal/v_modal_404');
            die;
        }
        
        return view('v_mata_kuliah_modal', [
            'modal' => 'edit',
            'row'   => $data,
        ]);
    }

    public function edit_proses(Request $request)
    {
        $id = $request->id;

        #==cek kode
        $cek = MataKuliah::where([
            ['kode', '=', $request->kode],
            ['id', '<>', $id],
        ])->first();

        if($cek != null){
            \sesAlert('danger', 'Kode telah terdaftar di database');
            return \back();
        }

        $sql = MataKuliah::find($id);
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
        DB::table('mata_kuliah')
        ->where('id', $request->id)
        ->delete();

        \sesAlert('success', 'Hapus data berhasil');
        return \back();
    }
}
