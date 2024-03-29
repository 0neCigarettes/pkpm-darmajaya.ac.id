<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pesertaModel;
use App\beritaModel;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MahasiswaContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $messages = [
        'required' => 'Harap Isi :attribute Anda',
        'mimes' => 'Format Gambar Harus jpeg, png, jpg',
        'image' => 'File Harus Berisi Gambar',
        'max' => 'Gambar Tidak Boleh Lebih Dari 2 Mb',
    ];
    public $rulesGambar = [
        'pembayaranPKPM' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'pembayaranBPP' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'transkripKRS' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'transkripNilai' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'transkripSks' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ];

    public function index()
    {
        $berita = beritaModel::all();
        $userActive = Auth::user()->id;
        $cekUser = User::join('tb_pesertapkpm', 'users.id', '=', 'tb_pesertapkpm.idUser')
            ->where('users.id', '=', $userActive)->count();
        $resposnse = ['sudahInput' => true];
        if ($cekUser > 0) {
            $resposnse['msg'] = 'Anda Sudah Mendaftar';
            $resposnse['status'] = true;
        } else {
            $resposnse['msg'] = 'Anda Sudah Mendaftar';
            $resposnse['status'] = false;
        }
        return view('mahasiswa.daftarPKPM')
            ->with([
                'resposnse' => $resposnse,
                'beritas' => $berita
            ]);
    }

    public function tampilData()
    {
        $berita = beritaModel::all();
        $userActive = Auth::user()->id;
        $data = pesertaModel::select('tb_pesertapkpm.*')
            ->where('idUser', '=', $userActive)->get();

        return view('mahasiswa.tampilData')
            ->with([
                'datas' => $data,
                'beritas' => $berita
            ]);
        // return json_encode($data);
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
            $file1 = $request->file('pembayaranPKPM');
            $file2 = $request->file('pembayaranBPP');
            $file3 = $request->file('transkripKRS');
            $file4 = $request->file('transkripNilai');
            $file5 = $request->file('transkripSks');
            $name1 = Str::random(16) . round(microtime(true)) . '.' . $file1->guessExtension();
            $name2 = Str::random(16) . round(microtime(true)) . '.' . $file2->guessExtension();
            $name3 = Str::random(16) . round(microtime(true)) . '.' . $file3->guessExtension();
            $name4 = Str::random(16) . round(microtime(true)) . '.' . $file4->guessExtension();
            $name5 = Str::random(16) . round(microtime(true)) . '.' . $file5->guessExtension();

            $file1->move('file/scanPKPM', $name1);
            $file2->move('file/scanBPP', $name2);
            $file3->move('file/scanKrs', $name3);
            $file4->move('file/scanNilai', $name4);
            $file5->move('file/scanSks', $name5);

            $data['pembayaranPKPM'] = $name1;
            $data['pembayaranBPP'] = $name2;
            $data['transkripKRS'] = $name3;
            $data['transkripNilai'] = $name4;
            $data['transkripSks'] = $name5;
            $data['idUser'] = Auth::user()->id;
            $data['nama'] = Auth::user()->name;
            $simpan = pesertaModel::create($data);

            $alert = [
                'afterAction' => true
            ];
            if ($simpan) {
                $alert['msg'] = 'Berhasil Daftar PKPM';
                $alert['sukses'] = true;
            } else {
                $alert['msg'] = 'Gagal Daftar PKPM';
                $alert['sukses'] = false;
            }
            return redirect()->back()->with($alert);
        }
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
        $file1 = pesertaModel::where('id', $id)->first()['pembayaranPKPM'];
        $file2 = pesertaModel::where('id', $id)->first()['pembayaranBPP'];
        $file3 = pesertaModel::where('id', $id)->first()['transkripKRS'];
        $file4 = pesertaModel::where('id', $id)->first()['transkripNilai'];
        $file5 = pesertaModel::where('id', $id)->first()['transkripSks'];
        
        $delete = pesertaModel::where('id', '=', $id)->delete();
        
        $alert = [
            'afterAction' => true
        ];
        if ($delete) {
            unlink('file/scanPKPM/' . $file1);
            unlink('file/scanBPP/' . $file2);
            unlink('file/scanKrs/' . $file3);
            unlink('file/scanNilai/' . $file4);
            unlink('file/scanSks/' . $file5);
            $alert['msg'] = 'Berhasil Menghapus Laporan !';
            $alert['sukses'] = true;
        } else {
            $alert['msg'] = 'Terjadi Kesalahan Saat Menghapus Laporan !';
            $alert['sukses'] = false;
        }

        return redirect()->back()->with($alert);
    }
}
