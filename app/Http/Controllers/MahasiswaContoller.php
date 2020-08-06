<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\pesertaModel;
use \App\User;
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
    ];

    public function index()
    {
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
        return view('mahasiswa.daftarPKPM')->with(['resposnse' => $resposnse]);
    }

    public function tampilData()
    {
        $userActive = Auth::user()->id;
        $data = pesertaModel::select('tb_pesertapkpm.*')
            ->where('idUser', '=', $userActive)->get();

        return view('mahasiswa.tampilData')->with(['datas' => $data]);
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
            $name1 = Str::random(16) . round(microtime(true)) . '.' . $file1->guessExtension();
            $name2 = Str::random(16) . round(microtime(true)) . '.' . $file2->guessExtension();
            $name3 = Str::random(16) . round(microtime(true)) . '.' . $file3->guessExtension();

            $file1->move('file/scanPKPM', $name1);
            $file2->move('file/scanBPP', $name2);
            $file3->move('file/scanKrs', $name3);

            $data['pembayaranPKPM'] = $name1;
            $data['pembayaranBPP'] = $name2;
            $data['transkripKRS'] = $name3;
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
        //
    }
}
