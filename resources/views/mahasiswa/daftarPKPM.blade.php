@extends('layouts.mahasiswaLayouts')

@section('content')
<div class="col-md-8">
  <div class="panel panel-primary">
    <div class="panel-heading">
      Form Daftar PKPM Darmajaya
    </div>
    <div class="panel-body">
      <form method="#" action="#">
        <div class="col-md-6">
          <div class="form-group">
            <label>Nama</label>
            <input required class="form-control" name="nama" type="text" placeholder="Nama Lengkap">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Nomor Pokok Mahasiwa</label>
            <input required class="form-control" name="npm" type="text" placeholder="NPM Anda">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Program Studi</label>
            <select required class="form-control" name="prodi" required>
              <option value="">--Pilih Prodi--</option>
              <option value="Tehnik Informatika">Tehnik Informatika</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Sistem Komputer">Sistem Komputer</option>
              <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
              <option value="Manajemen">Manajemen</option>
              <option value="Akuntansi">Akuntansi</option>
              <option value="Bisnis Digital">Bisnis Digital</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Scan Bukti Pembayaran PKPM</label>
            <input type="file" name="scanStrukPkpm" class="form-control" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Scan Bukti Pembayaran BPP</label>
            <input type="file" name="scanStrukBpp" class="form-control" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Scan Transkrip KRS</label>
            <input type="file" name="scanTranskripKrs" class="form-control" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Nomor Hp</label>
            <input required class="form-control" name="npm" type="text" placeholder="Nomor HP">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Ukuran Kaos</label>
            <input required class="form-control" name="ukuranKaos" type="text" placeholder="Ukuran Kaos">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <input class="form-control btn btn-primary" type="submit" value="Daftar">
          </div>
        </div>
      </form>
    </div>
    <div class="panel-footer">
      PKPM@Darmajaya.ac.id
    </div>
  </div>
</div>
<!-- /.col-lg-4 -->
@endsection