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

    //mahasiswa daftar
    Route::get('/home', 'adminController@index')->name('cekRegistrasiPKPM');
    Route::get('/admin/konfirmasi_peserta', 'adminController@konfirmasiView')->name('konfirmasiView');
    Route::get('/admin/konfirmasi_peserta/konfirmasi/{id}', 'adminController@konfirmasiPendaftaran')->name('konfirmasiPendaftaran');

    //mahasiswa laporan
    Route::get('/admin/lihat_laporan_PKPM', 'adminController@lihatLaporanpkpm')->name('lihatLaporan');
    Route::get('/admin/lihat_laporan_PKPM/delete/{id}', 'laporanController@destroy')->name('hapusLaporan');

    //panduanpkpm
    Route::get('/admin/upload_panduan', 'panduanContrller@index')->name('indexPanduan');
    Route::post('/admin/upload_panduan/upload', 'panduanContrller@store')->name('uploadPanduan');
    Route::get('/admin/upload_panduan/delete/{id}', 'panduanContrller@destroy')->name('deletePanduan');

    //berita pkpm
    Route::get('/admin/berita_index', 'beritaController@index')->name('indexBerita');
    Route::post('/admin/berita_index/upload', 'beritaController@store')->name('uploadBerita');
    Route::get('/admin/berita_index/delete/{id}', 'beritaController@destroy')->name('hapusBerita');

    //add akun sekjur
    Route::get('/admin/add_sekjur', 'sekjurController@index')->name('addIndex');
    Route::post('/admin/add_sekjur/add', 'sekjurController@store')->name('add');
});

//sekjur
Route::group(['middleware' => ['auth', 'ceklevel:2']], function () {

    //mahasiswa daftar
    Route::get('/sekjur', 'adminController@index')->name('indexSekjur');
    Route::get('/sekjur/konfirmasi_peserta', 'adminController@konfirmasiView')->name('konfirmasiViewsekjur');
    Route::get('/sekjur/konfirmasi_peserta/konfirmasi/{id}', 'adminController@konfirmasiPendaftaran')->name('konfirmasiPendaftaranbysekjur');

    //mahasiswa bagi kelompok


    //mahasiswa laporan
    Route::get('/sekjur/lihat_laporan_PKPM', 'adminController@lihatLaporanpkpm')->name('lihatLaporaninekjur');
    Route::get('/sekjur/lihat_laporan_PKPM/delete/{id}', 'laporanController@destroy')->name('hapusLaporaninsekjur');

    //panduan pkpm
    Route::get('/sekjur/upload_panduan', 'panduanContrller@index')->name('indexPanduaninsekjur');
    Route::post('/sekjur/upload_panduan/upload', 'panduanContrller@store')->name('uploadPanduaninsekjur');
    Route::get('/sekjur/upload_panduan/delete/{id}', 'panduanContrller@destroy')->name('deletePanduaninsekjur');

    //berita pkpm
    Route::get('/sekjur/berita_index', 'beritaController@index')->name('indexBeritainsekjur');
    Route::post('/sekjur/berita_index/upload', 'beritaController@store')->name('uploadBeritainsekjur');
    Route::get('/sekjur/berita_index/delete/{id}', 'beritaController@destroy')->name('hapusBeritainsekjur');
});

//mahasiswa
Route::group(['middleware' => ['auth', 'ceklevel:3']], function () {
    //pkpm daftar
    Route::get('/mahasiswa', 'MahasiswaContoller@index')->name('daftarPKPM');
    Route::post('/mahasiswa/daftar', 'MahasiswaContoller@store')->name('inputDaftarPKPM');
    Route::get('/mahasiswa/datapendaftaran', 'MahasiswaContoller@tampildata')->name('tampilData');

    //uploadLapranPKPM
    Route::get('/mahasiswa/uploadLaporan', 'laporanController@index')->name('uploadLapranPKPM');
    Route::post('/mahasiswa/uploadLaporan/input', 'laporanController@store')->name('inputLaporan');
});
