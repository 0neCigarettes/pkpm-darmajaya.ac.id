@extends('layouts.mahasiswaLayouts')
@section('header_content')
  Data Pendaftaran Anda
@endsection
@section('content')
<div class="col-md-8">
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
                          <th>Scan Transkrip Nilai</th>
                          <th>Nomo HP</th>
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
                            <img src="{{ url('file/scanPKPM') }}/{{$data['pembayaranPKPM']}}" alt="" width="200">
                            <a href="{{ asset('file/scanPKPM')}}/{{$data['pembayaranPKPM']}}" class="btn btn-primary" style="margin-top: 10px">Lihat</a>
                          </td>
                          <td align="center">
                            <img src="{{ url('file/scanBPP') }}/{{$data['pembayaranBPP']}}" alt="" width="200">
                            <a href="{{ asset('file/scanBPP')}}/{{$data['pembayaranBPP']}}" class="btn btn-primary" style="margin-top: 10px">Lihat</a>
                          </td>
                          <td align="center">
                            <img src="{{ url('file/scanKrs') }}/{{$data['transkripKRS']}}" alt="" width="200">
                            <a href="{{ asset('file/scanKrs')}}/{{$data['transkripKRS']}}" class="btn btn-primary" style="margin-top: 10px">Lihat</a>
                          </td>
                          <td align="center">
                            <img src="{{ url('file/scanNilai') }}/{{$data['transkripNilai']}}" alt="" width="200">
                            <a href="{{ asset('file/scanNilai')}}/{{$data['transkripNilai']}}" class="btn btn-primary" style="margin-top: 10px">Lihat</a>
                          </td>
                          <td>{{ $data['nomorHp'] }}</td>
                          <td>{{ $data['ukuranKaos'] }}</td>
                          <td>
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
</div>
@endsection

