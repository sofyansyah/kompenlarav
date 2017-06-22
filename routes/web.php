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

Route::get('/', 'HomeController@index');


//KARYAWAN
Route::get('karyawan', 'KaryawansController@index');
Route::get('tambah-karyawan', 'KaryawansController@tambah_karyawan');
Route::post('post-karyawan', 'KaryawansController@post_karyawan');
Route::get('edit/karyawan/{id}', 'KaryawansController@edit_karyawan');
Route::post('editpost/karyawan/{id}', 'KaryawansController@editpost_karyawan');
Route::get('hapus/karyawan/{id}', 'KaryawansController@hapus_karyawan');
Route::get('import-karyawan', 'KaryawansController@importExcel');

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

//PCR
Route::get('pcr', 'PcrsController@index');
Route::get('edit/pcr/{id}', 'PcrsController@editpcr');
Route::post('editpost/pcr/{id}', 'PcrsController@editpostpcr');
Route::get('hapus/pcr/{id}', 'PcrsController@hapuspcr');
Route::get('ekspor/pcr/{id}', 'PcrsController@ekspor_pcr');
// Route::get('pcr-lama', 'PcrsController@pcrlama');

//JCR
Route::post('rekap-jcr', 'AljcrController@index');

//EXCEL
Route::get('importExport', 'ExcelsController@importExport');
Route::get('downloadExcel/{type}', 'ExcelsController@downloadExcel');
Route::post('importExcel', 'ExcelsController@importExcel');