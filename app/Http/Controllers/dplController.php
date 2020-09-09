<?php

namespace App\Http\Controllers;

use App\pesanModel;
use App\User;
use App\beritaModel;
use App\laporanModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class dplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function download($lokasi,$nama_file)
    {
        $file_path = public_path('file/'.$lokasi.'/'.$nama_file);
        if (auth()->user()->level == 4){
            return response()->download($file_path);
        }else if(auth()->user()->level == 1){
            return response()->download($file_path);
        }else if (auth()->user()->level == 2){
            return response()->download($file_path);
        } else if (auth()->user()->level == 3){
            return response()->download($file_path);
        }
        
    
    // $file= public_path(). '/file/laporan'. $id;
        // $nama = Str::random(10);
        // $headers = array(
        //     'Content-Type: application/pdf',
        // );
        // // $d = url('file/laporan'/$id);
        // // return Storage::download($d->path, $d->title);
        // return $file->download( $nama. '.pdf', $headers);
        
    }

    public function index()
    {
        $userActive = auth()->user()->id;
        $data = User::where('dpl', '=', $userActive)->get();
        return view('dpl.index')->with(['datas' => $data]);

    }

    public function kirimPesan(request $request, $id)
    {
        $data = $request->all();
        $data['pengirim'] = auth()->user()->id;
        $data['penerima'] = $id;

        $insert = pesanModel::create($data);

        $alert = [
            'afterAction' => true
        ];
        if ($insert) {
            $alert['msg'] = 'Berhasil Mengirim Pesan';
            $alert['sukses'] = true;
        } else {
            $alert['msg'] = 'Gagal Mengirm Pesan';
            $alert['sukses'] = false;
        }
        if (auth()->user()->level == 4){
            return redirect()->route('pesanindpl', $id)->with($alert);
        } else if (auth()->user()->level ==3){
            return redirect()->route('pesaninmhs', $id)->with($alert);
        }

    }

    public function pesan($id)
    {
        $berita = beritaModel::all();
        $userActive = auth()->user()->id;
        $data = pesanModel::select('pesan', 'pengirim', 'penerima')
                ->where([
                    ['pengirim', '=', $userActive],
                    ['penerima', '=', $id]
                ])->orWhere([
                    ['pengirim', '=', $id],
                    ['penerima', '=', $userActive]
                ])
                ->get();
        $detail = User::where('id', $id)->first();
        if (auth()->user()->level == 4){
            return view('dpl.bimbingan')->with(['datas' => $data, 'detail' => $detail]);
        } else if (auth()->user()->level == 3){
            return view('mahasiswa.bimbingan')->with([
                'datas' => $data,
                'detail' => $detail,
                'beritas' => $berita]);
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
        //
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
