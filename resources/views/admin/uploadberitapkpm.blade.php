@extends('layouts.adminLayouts')
@section('header_content')
  Upload Berita PKPM
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
  @error('file')
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>{{ $message }}</strong>
    </div>
  @enderror
    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
      Tambah Berita
    </a>
  <div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>File berita</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($datas as $data)
                  <tr>
                    <td>{{ $data['namaBerita'] }}</td>
                    <td>
                      <a href="{{ url('file/berita')}}/{{ $data['file'] }}" class="btn btn-warning">Download</a>
                      <a href="{{ route('hapusBerita', $data['id'])}}">
                        <button class="btn btn-danger" onClick="return konfirmasi()">Hapus</button>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Upload Berita</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('uploadBerita')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="container-fluid">
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama Berita</label>
                      <input type="text" name="namaBerita" class="form-control" placeholder="Nama Berita" required>
                    </div>
                    <div class="form-group">
                      <label>File Berita (.PDF)</label>
                      <input type="file" name="file" class="form-control" required>
                      @error('file')
                        <span class="invalid-feedback" role="alert" style="background: #fb0601;">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Upload</button>
                </div>
              </div>
            </form>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection