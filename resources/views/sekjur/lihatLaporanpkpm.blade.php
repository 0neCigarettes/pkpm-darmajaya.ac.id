@extends('layouts.sekjurLayouts')
@section('header_content')
  Laporan PKPM Mahasiswa
@endsection
@section('content')
<div class="col-md-12">
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
                          <th>laporan</th>
                          <th>Video</th>
                          <th>aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($datas as $data)
                    <tr>
                      <td>{{ $data['nama'] }}</td>
                      <td>{{ $data['npm'] }}</td>
                      <td>
                        <a href="{{ route('downloadinsekjur', ['laporan',$data['laporan']]) }}" class="btn btn-warning">Download</a>
                      </td>
                      <td>
                        <a href="{{ route('downloadinsekjur', ['video',$data['video']]) }}" class="btn btn-warning">Download</a>
                      </td>
                      <td>
                        <a href="{{route('hapusLaporaninsekjur', $data['id'])}}">
                        <button class="btn btn-danger" onClick="return konfirmasi()">Hapus</button>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
      <!-- /.panel-body -->
  </div>
</div>
@endsection