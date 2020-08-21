@extends('layouts.sekjurLayouts')
@section('header_content')
	Data Mahasiswa Mendaftar
@endsection
@section('content') 
	{{-- notif --}}
<div class="col-lg-4 col-md-6">
		<div class="panel panel-primary">
				<div class="panel-heading">
						<div class="row">
								<div class="col-xs-3">
										<i class="fa fa-comments fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
										<div class="huge">{{$a}}</div>
										<div>Total Pendaftar PKPM</div>
								</div>
						</div>
				</div>
				<a href="#">
						<div class="panel-footer">
								<span class="pull-left">Lihat Detail</span>
								<span class="pull-right"
										><i class="fa fa-arrow-circle-right"></i
								></span>

								<div class="clearfix"></div>
						</div>
				</a>
		</div>
</div>
<div class="col-lg-4 col-md-6">
		<div class="panel panel-green">
				<div class="panel-heading">
						<div class="row">
								<div class="col-xs-3">
										<i class="fa fa-tasks fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
										<div class="huge">{{$b}}</div>
										<div>Peserta Terkonfirmasi</div>
								</div>
						</div>
				</div>
				<a href="#">
						<div class="panel-footer">
								<span class="pull-left">Lihat Detail</span>
								<span class="pull-right"
										><i class="fa fa-arrow-circle-right"></i
								></span>

								<div class="clearfix"></div>
						</div>
				</a>
		</div>
</div>
<div class="col-lg-4 col-md-6">
		<div class="panel panel-red">
				<div class="panel-heading">
						<div class="row">
								<div class="col-xs-3">
										<i class="fa fa-support fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
										<div class="huge">{{$c}}</div>
										<div>Belum Terkonfirmasi</div>
								</div>
						</div>
				</div>
				<a href="{{ route('konfirmasiViewsekjur')}}">
						<div class="panel-footer">
								<span class="pull-left">Lihat Detail</span>
								<span class="pull-right"
										><i class="fa fa-arrow-circle-right"></i
								></span>
								<div class="clearfix"></div>
						</div>
				</a>
		</div>
</div>
	{{-- end noif --}}


<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-body">
				<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
										<tr>
												<th>Nama</th>
												<th>NPM</th>
												<th>Jurusan</th>
												<th>Scan Pembayaran PKPM</th>
												<th>Scan Pembayaran BPP</th>
												<th>Scan Transkrip KRS</th>
												<th>Scan Transkrip Nilai</th>
												<th>Nomor HP</th>
												<th>Ukuran Kaos</th>
												<th>Status</th>
										</tr>
								</thead>
								<tbody>
									@foreach($datas as $data)
										<tr>
											<td>{{ $data['nama'] }}</td>
											<td>{{ $data['npm'] }}</td>
											<td>{{ $data['jurusan'] }}</td>
											<td align="center">
												<a href="{{url('file/scanPKPM')}}/{{ $data['pembayaranPKPM']}}" class="btn btn-warning">lihat</a>
											</td>
											<td align="center">
												<a href="{{url('file/scanBPP')}}/{{ $data['pembayaranBPP']}}" class="btn btn-warning">lihat</a>
											</td>
											<td align="center">
												<a href="{{url('file/scanKrs')}}/{{ $data['transkripKRS']}}" class="btn btn-warning">lihat</a>
											</td>
											<td align="center">
												<a href="{{url('file/scanNilai')}}/{{ $data['transkripNilai']}}" class="btn btn-warning">lihat</a>
											</td>
											<td>{{ $data['nomorHp']}}</td>
											<td>{{ $data['ukuranKaos']}}</td>
											<td align="center">
												@if ($data['status'] == 1)
													<a class="btn btn-danger">Menunggu Konfirmasi</a>
												@else
													<a class="btn btn-success">Terkonfirmasi</a>
												@endif
											</td>
										</tr>
									@endforeach
								</tbody>
						</table>
				</div>
		</div>
			<!-- /.panel-body -->
	</div>
	<!-- /.panel -->
</div>
	@endsection
