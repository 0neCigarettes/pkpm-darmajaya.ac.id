@extends('guest.index')
@section('content')
  @foreach($datas as $data)
  <h3><b>{{$data['namaFile']}}</b></h3><small><a href="{{ asset('file/panduan')}}/{{$data['file']}}">Download</a></small>
  @endforeach
@endsection