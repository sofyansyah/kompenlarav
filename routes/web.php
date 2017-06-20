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
// Route::get('/pcr', function () {
//     return view('pcr');
// });

Route::get('/rekap', function () {
    return view('rekap');
});
// Route::get('/kompetensi', function () {
//     return view('kompetensi');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('karyawan', 'KaryawansController');
Route::get('/kompetensi', 'KompetensisController@index');
Route::get('/pcr', 'PcrsController@index');
// Route::post('/rekap-jcr', 'AljcrController@index');
