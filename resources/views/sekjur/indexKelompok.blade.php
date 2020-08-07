@extends('layouts.sekjurLayouts')
@section('header_content')
  Data Kelompok Mahasiswa
@endsection
@section('content')
<div class="col-lg-6">
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
          <a class="btn btn-primary" data-toggle="modal" data-target="#modal-default"> Tambah Kelompok</a>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
          <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>Nama Kelompok</th>
                          <th>Dosen Pembimbing Lapangan</th>
                          <th>Nama Tempat/Desa</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($datas as $data)
                    <tr>
                      <td>{{ $data['namaKelompok'] }}</td>
                      <td>{{ $data['dpl'] }}</td>
                      <td>{{ $data['namaTempat'] }}</td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
          <!-- /.table-responsive -->
      </div>
      <!-- /.panel-body -->
  </div>

  {{-- modal tambah kelopok --}}
  <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Kelompok</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('aadKelompok')}}" method="POST">
                @csrf
              <div class="container-fluid">
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama Kelompok</label>
                      <input type="text" name="namaKelompok" class="form-control" placeholder="Nama Kelompok" required>
                    </div>
                    <div class="form-group">
                      <label>Dosen Pembimbing Lapangan</label>
                      <input type="text" name="dpl" class="form-control" placeholder="Dosen Pembimbing Lapangan" required>
                    </div>
                    <div class="form-group">
                      <label>nama Desa/Tempat</label>
                      <input type="text" name="namaTempat" class="form-control" placeholder="Nama Tempat/Desa" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </div>
            </form>
        </div>
        </div>
      </div>
    </div>
</div>
@endsection