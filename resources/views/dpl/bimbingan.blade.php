@extends('layouts.dplLayouts')
@section('header_content')
  Bimbingan Mahasiswa
@endsection
@section('content')
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
    <div class="chat-panel panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-comments fa-fw"></i>
        Chat
        <div class="btn-group pull-right">
            <button
                type="button"
                class="btn btn-default btn-xs dropdown-toggle"
                data-toggle="dropdown"
            >
                <i class="fa fa-chevron-down"></i>
            </button>
            <ul class="dropdown-menu slidedown">
                <li>
                    <a href="#">
                        <i
                            class="fa fa-refresh fa-fw"
                        ></i>
                        Refresh
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i
                            class="fa fa-check-circle fa-fw"
                        ></i>
                        Available
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i
                            class="fa fa-times fa-fw"
                        ></i>
                        Busy
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i
                            class="fa fa-clock-o fa-fw"
                        ></i>
                        Away
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <i
                            class="fa fa-sign-out fa-fw"
                        ></i>
                        Sign Out
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <ul class="chat">
            @foreach($datas as $data)
                <li class="{{ $data->pengirim === auth()->user()->id ? 'right' : 'left' }} clearfix">
                <span class="chat-img {{ $data->pengirim === auth()->user()->id ? 'pull-right' : 'pull-left' }}">
                    <img
                        src="{{ $data->pengirim === auth()->user()->id ? 'http://placehold.it/50/FA6F57/fff' : 'http://placehold.it/50/55C1E7/fff' }}"
                        alt="User Avatar"
                        class="img-circle"
                    />
                </span>

                <div class="chat-body clearfix">
                    <div class="header">
                        <small class="text-muted">
                            <i
                                class="fa fa-clock-o fa-fw"
                            ></i>
                        </small>
                        <strong
                            class="{{ $data->pengirim === auth()->user()->id ? 'pull-right' : 'pull-left' }} primary-font"
                            >{{ $data->pengirim === auth()->user()->id ? auth()->user()->name : $detail->name }}</strong
                        >
                    </div>
                    <p class="{{ $data->pengirim === auth()->user()->id ? 'pull-right' : 'pull-left' }}">
                        {{ $data['pesan'] }}
                    </p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <!-- /.panel-body -->
    <div class="panel-footer">
        <form action="{{ route('krimPesanindpl', $detail->id)}}" method="post">
            @csrf
            <div class="input-group">
                <input id="btn-input" type="text" name="pesan" class="form-control input-sm" placeholder="ketik pesan anda disini..."/>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-warning btn-sm" id="btn-chat">kirim</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /.panel-footer -->
    </div>
@endsection