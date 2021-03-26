<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/datakaryawan', 'KaryawanController@index')->name('datakaryawan');
Route::get('/datakaryawan/tambah', 'KaryawanController@tambah')->name('datakaryawan.tambah');
Route::post('/datakaryawan/store', 'KaryawanController@store');
Route::get('/datakaryawan/edit/{id}', 'KaryawanController@edit');
Route::put('/datakaryawan/update/{id}', 'KaryawanController@update');
Route::get('/datakaryawan/hapus/{id}', 'KaryawanController@delete');

Route::get('/masterrole', 'RoleController@index')->name('masterrole');
Route::get('/masterrole/tambah', 'RoleController@tambah')->name('masterrole.tambah');
Route::post('/masterrole/store', 'RoleController@store');
Route::get('/masterrole/edit/{id}', 'RoleController@edit');
Route::put('/masterrole/update/{id}', 'RoleController@update');
Route::get('/masterrole/hapus/{id}', 'RoleController@delete');

Route::get('/mastermenu', 'MenuController@index')->name('mastermenu');
Route::get('/mastermenu/tambah', 'MenuController@tambah')->name('mastermenu.tambah');
Route::post('/mastermenu/store', 'MenuController@store');
Route::get('/mastermenu/edit/{id}', 'MenuController@edit');
Route::put('/mastermenu/update/{id}', 'MenuController@update');
Route::get('/mastermenu/hapus/{id}', 'MenuController@delete');

Route::get('/masterrolemenu', 'RoleMenuController@index')->name('masterrolemenu');
Route::get('/masterrolemenu/tambah', 'RoleMenuController@tambah')->name('masterrolemenu.tambah');
Route::post('/masterrolemenu/store', 'RoleMenuController@store');
Route::get('/masterrolemenu/edit/{id}', 'RoleMenuController@edit');
Route::put('/masterrolemenu/update/{id}', 'RoleMenuController@update');
Route::get('/masterrolemenu/hapus/{id}', 'RoleMenuController@delete');