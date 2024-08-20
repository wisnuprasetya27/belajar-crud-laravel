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

#==MASTER DATA
Route::get('/dashboard', 'MainController@index')->middleware('role:all');

#==
Route::get('/user', 'AdminController@index')->middleware('role:all');
Route::get('/modal/user/tambah', 'AdminController@modal_tambah')->middleware('role:ad');
Route::post('/user/tambah', 'AdminController@tambah_proses')->middleware('role:ad');

Route::get('/modal/user/reset-password/{id}', 'AdminController@modal_reset_password')->middleware('role:ad');
Route::post('/user/reset-password', 'AdminController@reset_password_proses')->middleware('role:ad');

Route::get('/modal/user/edit/{id}', 'AdminController@modal_edit')->middleware('role:ad');
Route::post('/user/edit', 'AdminController@edit_proses')->middleware('role:ad');

Route::get('/modal/user/hapus/{id}', 'AdminController@modal_hapus')->middleware('role:ad');
Route::post('/user/hapus', 'AdminController@hapus_proses')->middleware('role:ad');