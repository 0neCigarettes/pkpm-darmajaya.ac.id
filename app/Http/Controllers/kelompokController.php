<?php

namespace App\Http\Controllers;

use App\kelompokModel;
use Illuminate\Http\Request;

class kelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kelompokModel::get();
        return view('sekjur.indexKelompok')->with(['datas' => $data]);
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

    public function kelompok(request $request)
    {
        $data = $request->all();
        $insert = kelompokModel::create($data);

        $alert = [
            'afterAction' => true
        ];
        if ($insert) {
            $alert['msg'] = 'Berhasil Menambah Kelompok';
            $alert['sukses'] = true;
        } else {
            $alert['msg'] = 'Gagal Menambah Kelompok';
            $alert['sukses'] = false;
        }

        return redirect()->back()->with($alert);
        // return json_encode($data);
    }
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
