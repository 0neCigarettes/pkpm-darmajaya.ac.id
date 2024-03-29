@extends('layouts.sekjurLayouts')
@section('header_content')
  Data Mahasiswa/<small><b>Kelompok [ {{$dataKelompok['namaKelompok']}} ]</b></small>
@endsection
@section('content')
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
      <div class="panel-heading">
          <a href="{{ route('addPeserta', $idKelompok ) }}" class="btn btn-primary"> Tambah peserta</a>
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
                        <a href="{{route('deleteInKelompok', [$data['idDetail'], $idKelompok])}}">
                        <button class="btn btn-danger" onClick="return konfirmasi()">Hapus</button>
                        </a>
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