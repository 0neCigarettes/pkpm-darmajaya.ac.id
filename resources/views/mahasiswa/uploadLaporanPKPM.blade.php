@extends('layouts.mahasiswaLayouts')

@section('header_content')
  Upload Laporan PKPM
@endsection

@section('content')
<div class="col-md-8">
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
  <div class="panel panel-primary">
    <div class="panel-heading">
      Form Upload Laporan PKPM Darmajaya
    </div>
    <div class="panel-body">
    <form method="POST" action="{{ route('inputLaporan')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
          <div class="form-group">
            <label>NPM</label>
            <input type="text" name="npm" class="form-control" placeholder="Nomor Pokok Mahasiswa" required>
            @error('npm')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Upload Laporan PKPM</label>
            <input type="file" name="laporan" class="form-control" required>
            @error('laporan')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Upload Video</label>
            <input type="file" name="video" class="form-control" required>
            @error('laporan')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
        </div>
        @if($resposnse['status'])
          <div class="col-md-12">
            <div class="alert alert-info">
              <p align="center">Anda Sudah Upload Laporan !</p>
            </div>
          </div>
          @else
          <div class="col-md-12">
            <div class="form-group">
              <button class="form-control btn btn-primary" type="submit">Upload</button>
            </div>
          </div>
        @endif
      </form>
    </div>
    <div class="panel-footer">
      PKPM@Darmajaya.ac.id
    </div>
  </div>
</div>
<!-- /.col-lg-4 -->
@endsection