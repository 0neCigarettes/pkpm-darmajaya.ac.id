@extends('layouts.dplLayouts')
@section('header_content')
  Mahasiswa Bimbingan Anda
@endsection
@section('content')
  <div class="col-lg-12">
    <div class="panel panel-default">
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>pesan</th>
                        </tr>
                    </thead>
                    <tbody>
  
                      @foreach($datas as $data)
                      <tr>
                        <td>{{ $data['username'] }}</td>
                        <td>{{ $data['name'] }}</td>
                        <td>{{ $data['jurusan'] }}</td>
                        <td>
                          <a class="btn btn-primary" href="{{ route('pesanindpl', $data['id'])}}"> pesan</a>
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
  </div>
@endsection