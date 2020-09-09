<?php

namespace App\Http\Controllers;

use App\pesertaModel;
use App\laporanModel;
use App\User;
use App\observasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function addDplView()
    {
        return view('admin.addDpl');
    }

    public function addDpl(Request $request)
    {
        $sukses;
        $msg;
        if ($this->emailExist($request->input('email'))) {
            $sukses = false;
            $msg = 'Gagal Menambah DPL, Karena Email Sudah Digunakan.';
        } else {
            // $password = bcrypt('12345678');
            // Hash::make($data['password']),
            $request->request->add(['password' => Hash::make($request['password']),]);
            $level = 4;
            $request->request->add(['level' => $level]);
            $insert = User::create($request->all());

            if ($insert) {
                $msg = 'Berhasil Menambah DPL !';
                $sukses = true;
            } else {
                $msg = 'Gagal Menambah DPL !';
                $sukses = false;
            }
        }
        return redirect()->back()->with([
            'afterAction' => true,
            'msg' => $msg,
            'sukses' => $sukses
        ]);
        // return json_encode($request->all());
    }

    public function emailExist($email)
    {
        $cek = User::where('email', '=', $email)->first();
        if ($cek == null) {
            return false;
        } else {
            return true;
        }
    }

    public function index()
    {
        $cekJurusanSekjur = auth()->user()->jurusan;

        $totalPesertaInsekjur = pesertaModel::where('jurusan', $cekJurusanSekjur)->count();
        $terkonfirmasiInSekjur = pesertaModel::where('jurusan', $cekJurusanSekjur)->where('status', 2)->count();
        $blmTrkonfirmasiInsekjur = pesertaModel::where('jurusan', $cekJurusanSekjur)->where('status', 1)->count();

        $totalPeserta = pesertaModel::count();
        $terkonfirmasi = pesertaModel::where('status', 2)->count();
        $belumTerkonfirmasi = pesertaModel::where('status', 1)->count();

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
                'a' => $totalPesertaInsekjur,
                'b' => $terkonfirmasiInSekjur,
                'c' => $blmTrkonfirmasiInsekjur,
            ]);
        }
        // return json_encode($dataToSejur);
    }

    public function konfirmasiView()
    {
        $cekJurusanSekjur = auth()->user()->jurusan;
        $datas = pesertaModel::where('status', 1)->where('jurusan', $cekJurusanSekjur)->get();
        $data = pesertaModel::where('status', 1)->get();
        // return json_encode($data);
        if (auth()->user()->level == 1) {
            return view('admin.konfirmasiPeserta')->with(['datas' => $data]);
        } else if (auth()->user()->level == 2) {
            return view('sekjur.konfirmasiPeserta')->with(['datas' => $datas]);
        }
    }

    public function lihatLaporanpkpm()
    {
        $data = laporanModel::get();
        $dpl = auth()->user()->id;
        $laporanInDpl = laporanModel::join('users', 'tb_uploadlaporanpkpm.idUser', '=', 'users.id')
                        ->where('users.dpl', '=', $dpl)->get();
        if (auth()->user()->level == 1) {
            return view('admin.lihatLaporanpkpm')->with(['datas' => $data]);
        } else if (auth()->user()->level == 2) {
            return view('sekjur.lihatLaporanpkpm')->with(['datas' => $data]);
        } else if (auth()->user()->level == 4) {
            return view('dpl.laporan')->with(['datas' => $laporanInDpl]);
        // return json_encode($laporanInDpl);
        }
    }

    public function konfirmasiPendaftaran(request $request, $id)
    {
        $data = $request->all();
        $ganti = 2;
        $data['status'] = $ganti;
        $update = pesertaModel::where('id', $id)->update($data);
        
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
