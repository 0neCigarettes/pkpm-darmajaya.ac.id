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

//semua bisa akses login
Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

//level 1 = admin
//level 2 = sekretaris jurusan (sekjur)
//level 3 = Mahasiwa

//admin
Route::group(['middleware' => ['auth', 'cekLevel:1']], function () {

    //route admin
    Route::get('/admin', 'adminController@index')->name('cekRegistrasiPKPM');
});

//sekjur
Route::group(['middleware' => ['auth', 'cekLevel:2']], function () {

    //route sekjur

});

//mahasiswa
Route::group(['middleware' => ['auth', 'cekLevel:3']], function () {

    //route mahasiswa

});
