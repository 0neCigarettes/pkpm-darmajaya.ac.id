@extends('layouts.mahasiswaLayouts')
@section('header_content')
  Daftar PKPM
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
      Form Daftar PKPM Darmajaya
    </div>
    <div class="panel-body">
      <form method="POST" action="{{ route('inputDaftarPKPM')}}" enctype="multipart/form-data">
        @csrf
          <div class="col-md-6">
            <div class="form-group">
              <label>Nama</label>
              <input required class="form-control" value="{{ Auth::user()->name }}" name="nama" type="text" disabled>
              @error('nama')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Nomor Pokok Mahasiwa</label>
              <input required name="npm" type="text" class="form-control @error('npm') is-invalid @enderror" value="{{ old('npm') }}" placeholder="NPM Anda">
              @error('npm')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
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
          <div class="col-md-6">
            <div class="form-group">
              <label>Scan Bukti Pembayaran PKPM</label>
              <input type="file" name="pembayaranPKPM" class="form-control @error('pembayaranPKPM') is-invalid @enderror" value="{{ old('pembayaranPKPM') }}" required>
              @error('pembayaranPKPM')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Scan Bukti Pembayaran BPP</label>
              <input type="file" name="pembayaranBPP" class="form-control @error('pembayaranBPP') is-invalid @enderror" value="{{ old('pembayaranBPP') }}" required>
              @error('pembayaranBPP')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Scan Transkrip KRS</label>
              <input type="file" name="transkripKRS" class="form-control @error('transkripKRS') is-invalid @enderror" value="{{ old('transkripKRS') }}" required>
              @error('transkripKRS')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Scan Transkrip Nilai</label>
              <input type="file" name="transkripNilai" class="form-control @error('transkripNilai') is-invalid @enderror" value="{{ old('transkripNilai') }}" required>
              @error('transkripNilai')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Scan Transkrip SKS</label>
              <input type="file" name="transkripSks" class="form-control @error('transkripSks') is-invalid @enderror" value="{{ old('transkripSks') }}" required>
              @error('transkripSks')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Nomor Hp</label>
              <input required class="form-control @error('nomorHP') is-invalid @enderror" value="{{ old('nomorHP') }}" name="nomorHP" type="text" placeholder="Nomor HP">
              @error('nomorHP')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Ukuran Kaos</label>
              <select required class="form-control @error('ukuranKaos') is-invalid @enderror" value="{{ old('ukuranKaos') }}" name="ukuranKaos" type="text" placeholder="Ukuran Kaos">
              <option value="">--Pilih Ukuran Kaos--</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
              <option value="XXL">XXL</option>
              <option value="XXXL">XXXL</option>
              </select>
              @error('ukuranKaos')
                <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          @if($resposnse['status'])
          <div class="col-md-12">
            <div class="alert alert-info">
              <p align="center">Anda Sudah Mendaftar !</p>
              <br>
              <p align="center"><a href="{{ route('tampilData')}}" class="btn btn-primary">Cek Status Pendaftaran</a></p>
            </div>
          </div>
          @else
            <div class="col-md-12">
              <div class="form-group">
                <input class="form-control btn btn-primary" type="submit" value="Daftar">
              </div>
            </div>
              @endif
      </form>
    </div>
    <div class="panel-footer">
      PKPM@Darmajaya.ac.id
    </div>
  </div>
</div>`
@endsection