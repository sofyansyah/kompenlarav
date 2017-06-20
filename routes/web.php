<?php

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
    return view('home');
});

Route::get('/rekap', function () {
    return view('rekap');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//KARYAWAN
Route::resource('karyawan', 'KaryawansController');

// Route::get('/kompetensi', 'KompetensisController@index');
// Route::get('/pcr', 'PcrsController@index');
// Route::get('/karyawan', 'KaryawansController@index');
// Route::get('pcr', 'PcrsController@index');
// Route::post('/rekap-jcr', 'AljcrController@index');

//KOMPETENSI
Route::get('kompetensi', 'KompetensisController@index');
Route::get('tambah-kompetensi', 'KompetensisController@tambah_kompetensi');
Route::post('post-kompetensi', 'KompetensisController@post_kompetensi');
Route::get('edit/kompetensi/{id}', 'KompetensisController@editkompetensi');
Route::post('editpost/kompetensi/{id}', 'KompetensisController@editpostkompetensi');
Route::get('hapus/kompetensi/{id}', 'KompetensisController@hapuskompetensi');

//JENIS KOMPETENSI
Route::get('add/jenis-kompetensi', 'KompetensisController@tambahjenis');
Route::post('post-jeniskom', 'KompetensisController@post_jeniskom');
