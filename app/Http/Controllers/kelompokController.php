<?php

namespace App\Http\Controllers;

use App\pesertaModel;
use App\kelompokModel;
use App\User;
use PDF;
use App\detailKelompokModel;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class kelompokController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$allKelompok = detailkelompokModel::join('tb_kelompok', 'tb_detail_kelompok.idKelompok', '=', 'tb_kelompok.idKelompok')
			->join('tb_pesertapkpm', 'tb_detail_kelompok.idPeserta', '=', 'tb_pesertapkpm.id')
			->join('users', 'tb_kelompok.dpl', '=', 'users.id')
			->select(
				'tb_pesertapkpm.npm',
				'tb_pesertapkpm.nama',
				'tb_pesertapkpm.jurusan',
				'tb_kelompok.namaKelompok',
				'users.name AS dpl',
				'tb_kelompok.namaTempat'
			)->orderBy('tb_kelompok.namaKelompok')->paginate(5);

		$lastNokel = kelompokModel::select('namaKelompok')->orderBy('namaKelompok', 'DESC')->first();
		$a;		
		if ($lastNokel == null){
					$a = 0;
				}else{
					$a = $lastNokel['namaKelompok'];
				}
		$nokel = (int) $a + 1;
		$data = kelompokModel::join('users', 'tb_kelompok.dpl', '=', 'users.id')
			->select('tb_kelompok.idKelompok', 'tb_kelompok.namaKelompok', 'users.name', 'tb_kelompok.namaTempat')->paginate(5);

		$cekDpl = kelompokModel::pluck('dpl')->all();
		$dataDPL = User::whereNotIn('id', $cekDpl)->where('level', '=', 4)->select('id', 'name')->get();

		return view('sekjur.indexKelompok')
			->with([
				'datas' => $data,
				'no' => $nokel,
				'dataKelompoks' => $allKelompok,
				'dataDPLs' => $dataDPL
			]);
	}

	public static function pdf()
	{
		$nama = Str::random(13) . round(microtime(true));
		$allKelompok = detailkelompokModel::join('tb_kelompok', 'tb_detail_kelompok.idKelompok', '=', 'tb_kelompok.idKelompok')
			->join('tb_pesertapkpm', 'tb_detail_kelompok.idPeserta', '=', 'tb_pesertapkpm.id')
			->join('users', 'tb_kelompok.dpl', '=', 'users.id')
			->select(
				'tb_pesertapkpm.npm',
				'tb_pesertapkpm.nama',
				'tb_pesertapkpm.jurusan',
				'tb_kelompok.namaKelompok',
				'users.name AS dpl',
				'tb_kelompok.namaTempat'
			)->orderBy('tb_kelompok.namaKelompok')->get();

		$pdf = PDF::loadView('sekjur/cetakPDF', ['datas' => $allKelompok], [])->setPaper('a4', 'potrait');
		return $pdf->download($nama . '.pdf');
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

	public function getPesertaByKelompok($id)
	{
		$dataKelompok = kelompokModel::where('idKelompok', $id)->first();
		$data = detailkelompokModel::join('tb_kelompok', 'tb_detail_kelompok.idKelompok', '=', 'tb_kelompok.idKelompok')
			->join('tb_pesertapkpm', 'tb_detail_kelompok.idPeserta', '=', 'tb_pesertapkpm.id')
			->join('users', 'tb_kelompok.dpl', '=', 'users.id')
			->select(
				'tb_detail_kelompok.idDetail',
				'tb_pesertapkpm.npm',
				'tb_pesertapkpm.nama',
				'tb_pesertapkpm.jurusan',
				'users.name AS dpl',
				'tb_kelompok.namaKelompok'
			)
			->where('tb_kelompok.idKelompok', $id)
			->get();

		return view('sekjur.viewInputPeserta')->with([
			'datas' => $data,
			'idKelompok' => $id,
			'dataKelompok' => $dataKelompok,
		]);
	}

	public function tambahpeserta($idkelompok, $idpeserta, $idDpl)
	{

		$idUser = pesertaModel::select('idUser')->where('id', '=', $idpeserta)->first();
		// return json_encode($idUser['idUser']);

		$dpl = User::where('id', $idUser['idUser'])->update(['dpl'=> $idDpl]);

		$insert = detailkelompokModel::create([
			'idKelompok' => $idkelompok,
			'idPeserta' => $idpeserta,
		]);

		$alert = [
			'afterAction' => true,
		];
		if ($insert && $dpl) {
			$alert['msg'] = 'Peserta Berhasil Ditambahkan';
			$alert['sukses'] = true;
		} else {
			$alert['msg'] = 'Maaf ! Peserta Gagal Ditambahakan';
			$alert['sukses'] = false;
		}

		return redirect()->route('getAllPeserta', $idkelompok)->with($alert);
	}

	public function addPeserta($idkelompok)
	{
		$dataKelompok = kelompokModel::join('users', 'tb_kelompok.dpl', '=', 'users.id')
			->where('idKelompok', $idkelompok)
			->select(
				'tb_kelompok.idKelompok',
				'tb_kelompok.namaKelompok',
				'tb_kelompok.dpl AS idDpl',
				'users.name AS dpl'
			)->first();

		$cekData = detailkelompokModel::pluck('idPeserta')->all();
		$data = pesertaModel::whereNotIn('id', $cekData)->where('status', '>', 0)->select('*')->get();
		return view('sekjur.allpeserta')
			->with([
				'datas' => $data,
				'idkelompok' => $idkelompok,
				'dataKelompok' => $dataKelompok
			]);
	}

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
	public function destroy($id, $idkelompok)
	{
		$delete = detailkelompokModel::where('idDetail', $id)->delete();
		$alert = [
			'afterAction' => true,
		];
		if ($delete) {
			$alert['msg'] = 'Peserta Berhasil Dihapus';
			$alert['sukses'] = true;
		} else {
			$alert['msg'] = 'Maaf ! Peserta Gagal Dihapus';
			$alert['sukses'] = false;
		}
		return redirect()->route('getAllPeserta', $idkelompok)->with($alert);
	}
}
