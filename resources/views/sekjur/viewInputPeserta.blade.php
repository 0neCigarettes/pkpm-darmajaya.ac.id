@extends('layouts.sekjurLayouts')
@section('header_content')
  Input Peserta
@endsection
@section('content')
  <div class="panel panel-default">
      <div class="panel-heading">
          <a href="#" class="btn btn-primary"> Tambah peserta</a>
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
                          <th>Dosen Pembimbing Lapangan</th>
                          <th>Nomor Kelompok</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($datas as $data)
                    <tr>
                      <td>{{ $data['npm'] }}</td>
                      <td>{{ $data['nama'] }}</td>
                      <td>{{ $data['jurusan'] }}</td>
                      <td>{{ $data['dpl'] }}</td>
                      <td>{{ $data['namaKelompok'] }}</td>
                      <td>
                        <a href="#" class="btn btn-danger">Hapus</a>
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