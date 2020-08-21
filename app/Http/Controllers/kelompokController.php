<?php

namespace App\Http\Controllers;

use App\pesertaModel;
use App\kelompokModel;
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
			->select(
				'tb_pesertapkpm.npm',
				'tb_pesertapkpm.nama',
				'tb_pesertapkpm.jurusan',
				'tb_kelompok.namaKelompok',
				'tb_kelompok.dpl',
				'tb_kelompok.namaTempat'
			)->orderBy('tb_kelompok.namaKelompok')->get();

		$nokel = rand();
		$data = kelompokModel::get();
		return view('sekjur.indexKelompok')
			->with([
				'datas' => $data,
				'no' => $nokel,
				'dataKelompoks' => $allKelompok
			]);
		// return json_encode($allKelompok);
	}

	public static function pdf()
	{
		$nama = Str::random(13) . round(microtime(true));
		$allKelompok = detailkelompokModel::join('tb_kelompok', 'tb_detail_kelompok.idKelompok', '=', 'tb_kelompok.idKelompok')
			->join('tb_pesertapkpm', 'tb_detail_kelompok.idPeserta', '=', 'tb_pesertapkpm.id')
			->select(
				'tb_pesertapkpm.npm',
				'tb_pesertapkpm.nama',
				'tb_pesertapkpm.jurusan',
				'tb_kelompok.namaKelompok',
				'tb_kelompok.dpl',
				'tb_kelompok.namaTempat'
			)->orderBy('tb_kelompok.namaKelompok')->get();

		$pdf = PDF::loadView('sekjur/cetakPDF', ['datas' => $allKelompok], [])->setPaper('a4', 'potrait');
		return $pdf->download($nama . '.pdf');

		// return view('sekjur.cetakPDF');
		// $pdf = PDF::loadView('sekjur/cetakPDF');
		// $pdf = PDF::loadView('sekjur.cetakPDF', ['a' => $allKelompok]);
		// return $pdf->stream('dafatar_peserta.pdf', array('Attachments' => false))->header('Content-Type', 'application/pdf');
		// return $pdf->stream();
		// return json_encode($allKelompok);
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
			->select(
				'tb_detail_kelompok.idDetail',
				'tb_pesertapkpm.npm',
				'tb_pesertapkpm.nama',
				'tb_pesertapkpm.jurusan',
				'tb_kelompok.dpl',
				'tb_kelompok.namaKelompok'
			)
			->where('tb_kelompok.idKelompok', $id)
			->get();
		// return json_encode($data);

		return view('sekjur.viewInputPeserta')->with([
			'datas' => $data,
			'idKelompok' => $id,
			'dataKelompok' => $dataKelompok,
		]);
	}

	public function tambahpeserta($idkelompok, $idpeserta)
	{

		$insert = detailkelompokModel::create([
			'idKelompok' => $idkelompok,
			'idPeserta' => $idpeserta,
		]);

		$alert = [
			'afterAction' => true,
		];
		if ($insert) {
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
		$dataKelompok = kelompokModel::where('idKelompok', $idkelompok)->first();
		$cekData = detailkelompokModel::pluck('idPeserta')->all();
		$data = pesertaModel::whereNotIn('id', $cekData)->where('status', '>', 0)->select('*')->get();
		// var_dump($idkelompok);
		return view('sekjur.allpeserta')->with(['datas' => $data, 'idkelompok' => $idkelompok, 'dataKelompok' => $dataKelompok]);
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
