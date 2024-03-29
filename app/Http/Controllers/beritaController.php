<?php

namespace App\Http\Controllers;

use App\beritaModel;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class beritaController extends Controller
{
    public $messages = [
        'required' => 'Harap Isi :attribute Anda',
        'mimetypes' => 'Gagal ! Format file Harus PDF !',
        'file' => 'File Harus Berisi PDF',
        'max' => 'file Tidak Boleh Lebih Dari 50 Mb'
    ];

    public $rulesGambar = [
        'file' => 'required|file|mimetypes:application/pdf|max:51200',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = beritaModel::get();
        if (auth()->user()->level == 1) {
            return view('admin.uploadberitapkpm')->with('datas', $data);
        } else if (auth()->user()->level == 2) {
            return view('sekjur.uploadberitapkpm')->with('datas', $data);
        }
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
            $file = $request->file('file');
            $nama = Str::random(16) . round(microtime(true)) . '.' . $file->guessExtension();
            $data['idUser'] = Auth::user()->id;
            $data['file'] = $nama;
            $file->move('file/berita', $nama);

            $input = beritaModel::create($data);
            $alert = [
                'afterAction' => true
            ];
            if ($input) {
                $alert['msg'] = 'Berhasil Upload berita';
                $alert['sukses'] = true;
            } else {
                $alert['msg'] = 'Gagal Upload berita';
                $alert['sukses'] = false;
            }
        }
        return redirect()->back()->with($alert);
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
        $fileLama = beritaModel::where('id', $id)->first()['file'];
        $delete = beritaModel::where('id', '=', $id)
            ->delete();
        $alert = [
            'afterAction' => true
        ];
        if ($delete) {
            unlink('file/berita/' . $fileLama);
            $alert['msg'] = 'Berhasil Menghapus Laporan !';
            $alert['sukses'] = true;
        } else {
            $alert['msg'] = 'Terjadi Kesalahan Saat Menghapus Laporan !';
            $alert['sukses'] = false;
        }
        return redirect()->back()->with($alert);
    }
}
