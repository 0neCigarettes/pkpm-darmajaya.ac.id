@extends('layouts.sekjurLayouts')
@section('header_content')
  Data Mahasiswa
@endsection
@section('content')
  <div class="panel panel-default">
      <div class="panel-heading">
        <h3><b>Nomor Kelompok</b> [{{$dataKelompok['namaKelompok']}}] <b>Dosen Pembimbing Lapangan</b> [{{$dataKelompok['dpl']}}]</h3>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
          <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>NPM</th>
                          <th>Nama</th>
                          <th>Program Studi</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($datas as $data)
                    <tr>
                      <td>{{ $data['npm'] }}</td>
                      <td>{{ $data['nama'] }}</td>
                      <td>{{ $data['jurusan'] }}</td>
                      <td>
                        <a href="{{ route('tambah', [$dataKelompok['idKelompok'], $data['id']])}}" class="btn btn-primary">tambah ke kelompok ini</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
          <!-- /.table-responsive -->
      </div>
      <!-- /.panel-body -->
  </div>
@endsection