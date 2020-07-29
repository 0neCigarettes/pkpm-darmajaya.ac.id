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

//guest akses
Route::get('/', 'guestController@index')->name('guestIndex');


Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

//level 1 = admin
//level 2 = sekretaris jurusan (sekjur)
//level 3 = Mahasiwa

//admin
Route::group(['middleware' => ['auth', 'ceklevel:1']], function () {

    //route admin
    Route::get('/home', 'adminController@index')->name('cekRegistrasiPKPM');
});

//sekjur
Route::group(['middleware' => ['auth', 'ceklevel:2']], function () {

    //route sekjur

});

//mahasiswa
Route::group(['middleware' => ['auth', 'ceklevel:3']], function () {

    Route::get('/mahasiswa', 'MahasiswaContoller@index')->name('daftarPKPM');
    Route::get('/uploadLaporan', 'MahasiswaContoller@upload')->name('uploadLapranPKPM');
});
