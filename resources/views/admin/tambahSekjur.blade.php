@extends('layouts.adminLayouts')
@section('header_content')
  Tambah Akun Sekjur
@endsection
@section('content')
<div class="col-lg-6 col-md-12 col-sm-12 ">
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
      Form Tambah Akun Sekjur
    </div>
    <div class="panel-body">
      <form method="POST" action="{{ route('add')}}">
                        @csrf
          <div class="col-lg-12">
            <div class="form-group">
              <label>Username (NIP)</label>
              <input required class="form-control" name="username" type="text"  placeholder="Username/NIP">
              @error('username')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>Nama Sekjur</label>
              <input required class="form-control" name="name" type="text"  placeholder="Nama Sekjur">
              @error('nama')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Jurusan</label>
              <select required name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{ old('jurusan') }}" required>
                <option value="">--Pilih Jurusan--</option>
                <option value="Tehnik Informatika">Tehnik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Sistem Komputer">Sistem Komputer</option>
                <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                <option value="Manajemen">Manajemen</option>
                <option value="Akuntansi">Akuntansi</option>
                <option value="Bisnis Digital">Bisnis Digital</option>
              </select>
              @error('jurusan')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>E-mail</label>
              <input required class="form-control" name="email" type="email"  placeholder="E-mail">
              @error('email')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>Password</label>
              <input required class="form-control" name="password" type="password"  placeholder="Password">
              @error('password')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          {{-- @if($resposnse['status'])
          <div class="col-md-12">
            <div class="alert alert-info">
              <p align="center">Anda Sudah Mendaftar !</p>
              <br>
              <p align="center"><a href="{{ route('tampilData')}}" class="btn btn-primary">Cek Status Pendaftaran</a></p>
            </div>
          </div>
          @else --}}
            <div class="col-md-12">
              <div align="center">
                <input class="btn btn-primary" type="submit" value="Tambah">
              </div>
            </div>
              {{-- @endif --}}
      </form>
    </div>
    <div class="panel-footer">
      PKPM@Darmajaya.ac.id
    </div>
  </div>
</div>
@endsection