<?php

namespace App\Http\Controllers;

use App\pesertaModel;
use App\laporanModel;
use App\User;
use App\observasiModel;
use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cekJurusanSekjur = auth()->user()->jurusan;
        $totalPeserta = pesertaModel::count();
        $belumTerkonfirmasi = pesertaModel::where('status', 1)->count();
        $terkonfirmasi = pesertaModel::where('status', 2)->count();

        // // $fileLama = laporanModel::where('id', $id)->first()['laporan'];

        $dataToSejur = pesertaModel::where('jurusan', $cekJurusanSekjur)->get();
        $data = pesertaModel::get();
        if (auth()->user()->level == 1) {
            return view('admin.index')->with([
                'datas' => $data,
                'a' => $totalPeserta,
                'b' => $terkonfirmasi,
                'c' => $belumTerkonfirmasi,
            ]);
        } else if (auth()->user()->level == 2) {
            return view('sekjur.index')->with([
                'datas' => $dataToSejur,
                'a' => $totalPeserta,
                'b' => $terkonfirmasi,
                'c' => $belumTerkonfirmasi,
            ]);
        }
        return json_encode($dataToSejur);
    }

    public function konfirmasiView()
    {
        $data = pesertaModel::where('status', 1)->get();
        // return json_encode($data);
        if (auth()->user()->level == 1) {
            return view('admin.konfirmasiPeserta')->with(['datas' => $data]);
        } else if (auth()->user()->level == 2) {
            return view('sekjur.konfirmasiPeserta')->with(['datas' => $data]);
        }
    }

    public function lihatLaporanpkpm()
    {
        $data = laporanModel::get();
        if (auth()->user()->level == 1) {
            return view('admin.lihatLaporanpkpm')->with(['datas' => $data]);
        } else if (auth()->user()->level == 2) {
            return view('sekjur.lihatLaporanpkpm')->with(['datas' => $data]);
        }
    }

    public function konfirmasiPendaftaran(request $request, $id)
    {
        $data = $request->all();
        $ganti = 2;
        $data['status'] = $ganti;
        $update = pesertaModel::where('id', $id)
            ->update($data);
        $alert = [
            'afterAction' => true
        ];

        if ($update) {
            $alert['msg'] = 'Konfirmasi Sukses';
            $alert['sukses'] = true;
        } else {
            $alert['msg'] = 'Konfirmasi Gagal';
            $alert['sukses'] = false;
        }

        return redirect()->back()->with($alert);
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
