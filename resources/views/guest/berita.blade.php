@extends('guest.index')
@section('content')
  @foreach($datas as $data)
  <h3><b>{{$data['namaFile']}}</b></h3><small><a href="{{ route('downloadinguest', ['panduan',$data['file']]) }}">Download</a></small>
  @endforeach
  {{$datas->links()}}
@endsection