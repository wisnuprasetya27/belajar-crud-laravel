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
Route::get('/user/{role}', 'UserController@index')->middleware('role:all');
Route::get('/modal/user/tambah/{role}', 'UserController@modal_tambah')->middleware('role:admin');
Route::post('/user/tambah/{role}', 'UserController@tambah_proses')->middleware('role:admin');

Route::get('/modal/user/edit/{id}/{role}', 'UserController@modal_edit')->middleware('role:admin');
Route::post('/user/edit', 'UserController@edit_proses')->middleware('role:admin');

Route::post('/user/reset-password', 'UserController@reset_password_proses')->middleware('role:admin');

Route::post('/user/hapus', 'UserController@hapus_proses')->middleware('role:admin');