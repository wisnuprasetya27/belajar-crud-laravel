<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/404', 'ErrorController@err404');

#==LOGIN AUTH
Route::redirect('/', '/login');
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login_proses');
Route::get('/logout', 'LoginController@logout_proses')->middleware();

#==DATA
Route::get('/dashboard', 'MainController@index')->middleware('role:all');

#==
Route::get('/user/{role}', 'UserController@index')->middleware('role:all');
Route::get('/modal/user/tambah/{role}', 'UserController@modal_tambah')->middleware('role:admin');
Route::post('/user/tambah/{role}', 'UserController@tambah_proses')->middleware('role:admin');

Route::get('/modal/user/edit/{id}/{role}', 'UserController@modal_edit')->middleware('role:admin');
Route::post('/user/edit', 'UserController@edit_proses')->middleware('role:admin');

Route::get('/user/reset-password/{id}/{new_password}', 'UserController@reset_password_proses')->middleware('role:admin');
Route::get('/user/hapus/{id}', 'UserController@hapus_proses')->middleware('role:admin');

#==
Route::get('/mata-kuliah', 'MataKuliahController@index')->middleware('role:all');
Route::get('/modal/mata-kuliah/tambah', 'MataKuliahController@modal_tambah')->middleware('role:admin');
Route::post('/mata-kuliah/tambah', 'MataKuliahController@tambah_proses')->middleware('role:admin');

Route::get('/modal/mata-kuliah/edit/{id}', 'MataKuliahController@modal_edit')->middleware('role:admin');
Route::post('/mata-kuliah/edit', 'MataKuliahController@edit_proses')->middleware('role:admin');

Route::get('/mata-kuliah/hapus/{id}', 'MataKuliahController@hapus_proses')->middleware('role:admin');

#==
Route::get('/kelas', 'KelasController@index')->middleware('role:all');
Route::get('/modal/kelas/tambah', 'KelasController@modal_tambah')->middleware('role:admin');
Route::post('/kelas/tambah', 'KelasController@tambah_proses')->middleware('role:admin');

Route::get('/modal/kelas/edit/{id}', 'KelasController@modal_edit')->middleware('role:admin');
Route::post('/kelas/edit', 'KelasController@edit_proses')->middleware('role:admin');

Route::get('/kelas/hapus/{id}', 'KelasController@hapus_proses')->middleware('role:admin');

#==
Route::get('/kelas-mahasiswa/{kelas_id}', 'KelasMahasiswaController@index')->middleware('role:all');
Route::get('/modal/kelas-mahasiswa/tambah/{kelas_id}', 'KelasMahasiswaController@modal_tambah')->middleware('role:admin');
Route::post('/kelas-mahasiswa/tambah', 'KelasMahasiswaController@tambah_proses')->middleware('role:admin');

Route::get('/kelas-mahasiswa/edit-nilai/{id}/{nilai}', 'KelasMahasiswaController@edit_nilai_proses')->middleware('role:admin');
Route::get('/kelas-mahasiswa/hapus/{id}', 'KelasMahasiswaController@hapus_proses')->middleware('role:admin');