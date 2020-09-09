<?php

use App\Http\Controllers\dplController;
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
Route::get('/', 'guestController@index')->name('berita');
Route::get('/kkn-fakultas', 'guestController@kkn')->name('kkn');
Route::get('/pkpm', 'guestController@pkpm')->name('pkpm');
Route::get('/kontak', 'guestController@kontak')->name('kontak');
Route::get('/observasi', 'guestController@observasi')->name('observasiInGuest');
Route::get('/guest/download/file/{path}/{nama_file}', 'guestController@download')->name('downloadinguest');


Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

//level 1 = admin
//level 2 = sekretaris jurusan (sekjur)
//level 3 = Mahasiwa

//admin
Route::group(['middleware' => ['auth', 'ceklevel:1']], function () {

    //admin
    Route::get('/admin/download/file/{path}/{nama_file}', 'dplController@download')->name('downloadFileinadmin');

    //mahasiswa daftar
    Route::get('/admin', 'adminController@index')->name('cekRegistrasiPKPM');
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

    //add dpl
    Route::get('/admin/add_dpl', 'adminController@addDplView')->name('addDplView');
    Route::post('/admin/add_dpl/insert', 'adminController@addDpl')->name('addDpl');

    //observasi
    Route::get('/admin/observasi', 'panduanContrller@observasi')->name('observasi');
    Route::post('/admin/observasi/input', 'panduanContrller@addForm')->name('input');
    Route::get('/admin/observasi/delete/{id}', 'panduanContrller@delete')->name('delete');
});

//sekjur
Route::group(['middleware' => ['auth', 'ceklevel:2']], function () {

    //mahasiswa daftar
    Route::get('/sekjur', 'adminController@index')->name('indexSekjur');
    Route::get('/sekjur/konfirmasi_peserta', 'adminController@konfirmasiView')->name('konfirmasiViewsekjur');
    Route::get('/sekjur/konfirmasi_peserta/konfirmasi/{id}', 'adminController@konfirmasiPendaftaran')->name('konfirmasiPendaftaranbysekjur');

    // kelompok
    Route::get('/sekjur/kelompok_mahasiswa', 'kelompokController@index')->name('indexKelompok');
    Route::post('/sekjur/kelompok_mahasiswa/add', 'kelompokController@kelompok')->name('addKelompok');
    Route::get('/sekjur/kelompok_mahasiswa/input/{id}', 'kelompokController@getPesertaByKelompok')->name('getAllPeserta');
    Route::get('/sekjur/kelompok_mahasiswa/peserta', 'kelompokController@getPesertaNonKelompok')->name('getPesertaNonKelompok');
    Route::get('/sekjur/kelompok_mahasiswa/peserta/add/{idkelompok}', 'kelompokController@addPeserta')->name('addPeserta');
    Route::get('/sekjur/kelompok_mahasiswa/peserta/addtokelompok/{idkelompok}/{idpeserta}/{idDpl}', 'kelompokController@tambahpeserta')->name('tambah');
    Route::get('/sekjur/kelompok_mahasiswa/peserta/cetakPdf', 'kelompokController@pdf')->name('cetakPDF');

    //hapus peserta
    Route::get('/sekjur/kelompok_mahasiswa/peserta/delete/{id}/{idKelompok}', 'kelompokController@destroy')->name('deleteInKelompok');

    //download
    Route::get('/sekjur/download/file/{path}/{nama_file}', 'dplController@download')->name('downloadinsekjur');

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

    //download
    Route::get('/mahasiswa/download/file/{path}/{nama_file}', 'dplController@download')->name('downloadFileInmhs');

    //pesan
    Route::get('/mahsiswa/bimbingan_mhs/{id}', 'dplController@pesan')->name('pesaninmhs');
    Route::post('/mahasiswa/bimbingan_mhs/kirimpesan/{id}', 'dplController@kirimPesan')->name('krimPesaninmhs');
});

//dpl
Route::group(['middleware' => ['auth', 'ceklevel:4']], function () {
    Route::get('/dpl', 'dplController@index')->name('indexDpl');

    //laporan
    Route::get('/dpl/lihat_laporan_PKPM', 'adminController@lihatLaporanpkpm')->name('lihatLaporanindpl');
    Route::get('/dpl/lihat_laporan_PKPM/delete/{id}', 'laporanController@destroy')->name('hapusLaporanindpl');

    //download file
    Route::get('/download/file/{path}/{nama_file}', 'dplController@download')->name('downloadFile');

    //pesan
    Route::get('/dpl/bimbingan_mhs/{id}', 'dplController@pesan')->name('pesanindpl');
    Route::post('/dpl/bimbingan_mhs/kirimpesan/{id}', 'dplController@kirimPesan')->name('krimPesanindpl');
});
