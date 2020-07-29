@extends('layouts.mahasiswaLayouts')

@section('content')
<div class="col-md-8">
  <div class="panel panel-primary">
    <div class="panel-heading">
      Form Upload Laporan PKPM Darmajaya
    </div>
    <div class="panel-body">
      <form method="#" action="#">
        <div class="col-md-12">
          <div class="form-group">
            <label>Upload Laporan PKPM</label>
            <input type="file" name="scanStrukPkpm" class="form-control" required>
          </div>
        </div>
        <br>
        <div>
          <div class="col-md-12">
            <div class="form-group">
              <button class="form-control btn btn-primary">Upload</button>
            </div>
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