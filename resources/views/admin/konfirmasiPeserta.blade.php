@extends('layouts.adminLayouts')
@section('header_content')
  Data Mahasiswa Belum Terkonfirmasi
@endsection
@section('content')
<div class="col-lg-12">
  @if (session('afterAction'))
    @if (session('sukses'))
    <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>{{ session('msg')}}</strong>
    </div>
    @else
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>{{ session('msg')}}</strong>
    </div>
    @endif
  @endif
	<div class="panel panel-default">
		<!-- /.panel-heading -->
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
												<th>Nomor HP</th>
												<th>Ukuran Kaos</th>
												<th>Status</th>
												<th>Aksi</th>
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
											<td>{{ $data['nomorHp']}}</td>
											<td>{{ $data['ukuranKaos']}}</td>
											<td>
												@if ($data['status'] == 1)
													<a class="btn btn-danger">Menunggu Konfirmasi</a>
												@else
													<a class="btn btn-success">Terkonfirmasi</a>
												@endif
                      </td>
                      <td><a href="{{ route('konfirmasiPendaftaran', $data['id']) }}" class="btn btn-primary">Konfirmasi</a></td>
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