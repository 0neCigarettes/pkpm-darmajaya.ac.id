@extends('guest.index')
@section('content')
  @foreach($observasis as $data)
  <h3><b>{{$data['namaFile']}}</b></h3><small><a href="{{ route('downloadinguest', ['observasi',$data['file']]) }}">Download</a></small>
  @endforeach
  {{$observasis->links()}}
@endsection