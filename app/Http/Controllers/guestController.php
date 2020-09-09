<?php

namespace App\Http\Controllers;

use App\beritaModel;
use App\panduanModel;
use App\observasiModel;
use Illuminate\Http\Request;

class guestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function download($lokasi,$nama_file)
    {
        $file_path = public_path('file/'.$lokasi.'/'.$nama_file);
        return response()->download($file_path);
    }
        
    public function index()
    {
        $panduan = panduanModel::paginate(7);
        $berita = beritaModel::paginate(7);
        return view('guest.berita')->with(['datas' => $panduan, 'beritas' => $berita]);
    }

    public function observasi()
    {
        $observasi = observasiModel::paginate(7);
        $panduan = panduanModel::paginate(7);
        $berita = beritaModel::paginate(7);
        return view('guest.observasi')->with(['observasis' => $observasi, 'datas' => $panduan, 'beritas' => $berita]);
    }

    public function kkn()
    {
        $data = panduanModel::paginate(7);
        $berita = beritaModel::paginate(7);
        return view('guest.kknF')->with(['datas' => $data, 'beritas' => $berita]);
    }

    public function kontak()
    {
        $panduan = panduanModel::paginate(7);
        $berita = beritaModel::paginate(7);
        return view('guest.kontak')->with(['datas' => $panduan, 'beritas' => $berita]);
    }

    public function pkpm()
    {
        $panduan = panduanModel::paginate(7);
        $berita = beritaModel::paginate(7);
        return view('guest.pkpm')->with(['datas' => $panduan, 'beritas' => $berita]);
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
