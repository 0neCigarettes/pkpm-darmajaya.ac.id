<?php

namespace App\Http\Controllers;

use App\pesertaModel;
use App\kelompokModel;
use App\detailKelompokModel;
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

	public function getPesertaByKelompok($id)
	{
		$data = detailkelompokModel::join('tb_kelompok', 'tb_detail_kelompok.idKelompok', '=', 'tb_kelompok.idKelompok')
			->join('tb_pesertapkpm', 'tb_detail_kelompok.idPeserta', '=', 'tb_pesertapkpm.id')
			->select(
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
			'datas' => $data
		]);
	}

	public function getPesertaNonKelompok()
	{
		$cekData = detailkelompokModel::pluck('idPeserta')->all();
		$data = pesertaModel::whereNotIn('id', $cekData)->where('status', '>', 0)->select('*')->get();

		return json_encode($data);
	}

	public function inputPeserta(Request $request, $id)
	{
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
	public function destroy($id)
	{
		//
	}
}
