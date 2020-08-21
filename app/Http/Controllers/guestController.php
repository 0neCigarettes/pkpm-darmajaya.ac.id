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
    public function index()
    {
        $data = panduanModel::all();
        $berita = beritaModel::get();
        return view('guest.berita')->with(['datas' => $data, 'beritas' => $berita]);
    }

    public function observasi()
    {
        $observasi = observasiModel::get();
        $data = panduanModel::all();
        $berita = beritaModel::get();
        return view('guest.observasi')->with(['observasis' => $observasi, 'datas' => $data, 'beritas' => $berita]);
    }

    public function kkn()
    {
        $data = panduanModel::all();
        $berita = beritaModel::get();
        return view('guest.kknF')->with(['datas' => $data, 'beritas' => $berita]);
    }

    public function kontak()
    {
        $data = panduanModel::all();
        $berita = beritaModel::get();
        return view('guest.kontak')->with(['datas' => $data, 'beritas' => $berita]);
    }

    public function pkpm()
    {
        $data = panduanModel::all();
        $berita = beritaModel::get();
        return view('guest.pkpm')->with(['datas' => $data, 'beritas' => $berita]);
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
