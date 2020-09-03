<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\laporanModel;
use App\beritaModel;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class laporanController extends Controller
{
    public $messages = [
        'required' => 'Harap Isi :attribute Anda',
        'mimetypes' => 'Format file Harus PDF',
        'file' => 'File Harus Berisi :attribute ',
        'max' => 'file Tidak Boleh Lebih Dari :atribute'
    ];

    public $rulesGambar = [
        'laporan' => 'required|file|mimetypes:application/pdf|max:51200',
        'video' => 'required|mimetypes:video/mp4|max:1024000',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = beritaModel::all();
        $userActive = Auth::user()->id;
        $cekUser = User::join('tb_uploadlaporanpkpm', 'users.id', '=', 'tb_uploadlaporanpkpm.idUser')
            ->where('users.id', '=', $userActive)->count();
        $resposnse = ['sudahInput' => true];
        if ($cekUser > 0) {
            $resposnse['msg'] = 'Anda Sudah Mendaftar';
            $resposnse['status'] = true;
        } else {
            $resposnse['msg'] = 'Anda Belum Mendaftar';
            $resposnse['status'] = false;
        }
        return view('mahasiswa.uploadLaporanPKPM')
            ->with([
                'resposnse' => $resposnse,
                'beritas' => $berita
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rulesGambar, $this->messages);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $request->all();
            $laporan = $request->file('laporan');
            $nama = Str::random(16) . round(microtime(true)) . '.' . $laporan->guessExtension();

            $laporan->move('file/laporan', $nama);

            $data['idUser'] = Auth::user()->id;
            $data['nama'] = Auth::user()->name;
            $data['laporan'] = $nama;

            $input = laporanModel::create($data);
            $alert = [
                'afterAction' => true
            ];
            if ($input) {
                $alert['msg'] = 'Berhasil Upload Laporan';
                $alert['sukses'] = true;
            } else {
                $alert['msg'] = 'Gagal Upload Laporan';
                $alert['sukses'] = false;
            }
        }
        return redirect()->back()->with($alert);
        // return json_encode($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileLama = laporanModel::where('id', $id)->first()['laporan'];
        $delete = laporanModel::where('id', '=', $id)
            ->delete();
        $alert = [
            'afterAction' => true
        ];
        if ($delete) {
            unlink('file/laporan/' . $fileLama);
            $alert['msg'] = 'Berhasil Menghapus Laporan !';
            $alert['sukses'] = true;
        } else {
            $alert['msg'] = 'Terjadi Kesalahan Saat Menghapus Laporan !';
            $alert['sukses'] = false;
        }

        if (Auth()->user()->level == 1) {
            return redirect()->route('lihatLaporan')->with($alert);
        } else if (Auth()->user()->level == 2) {
            return redirect()->route('lihatLaporaninekjur')->with($alert);
        }
        // return json_encode($fileLama);
    }
}
