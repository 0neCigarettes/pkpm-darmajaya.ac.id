<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PKPM@Darmajaya.ac.id</title>

  <!-- Bootstrap Core CSS -->
  <link href="{{ url('./newasset/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="{{ url('./newasset/css/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="{{ url('./newasset/css/dataTables/dataTables.responsive.css')}}" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="{{ url('./newasset/css/metisMenu.min.css')}}" rel="stylesheet">

  <!-- Timeline CSS -->
  <link href="{{ url('./newasset/css/timeline.css')}}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ url('./newasset/css/startmin.css')}}" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="{{ url('./newasset/css/morris.css')}}" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="{{ url('./newasset/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <ul class="nav navbar-nav navbar-left navbar-top-links">
        <h4>
          <li><a><i class="fa fa-home fa-fw"></i>PKPM Darmajaya/Mahasiswa</a></li>
        </h4>
      </ul>

      <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <b class="caret"></b>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li class="divider"></li>
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                <i class="fa fa-sign-out fa-fw">
                  Logout
                </i>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- /.navbar-top-links -->

      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <li class="sidebar-search">
              <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
              <!-- /input-group -->
            </li>
            <li>
              <a href="{{ route('daftarPKPM')}}" class="active"><i class="fa fa-pencil-square-o fa-fw"></i> Daftar PKPM</a>
            </li>
            @if (Auth::user()->dpl != null)
            <li>
              <a href="{{ route('pesaninmhs', Auth::user()->dpl ) }}" class="active"><i class="fa fa-file-text fa-fw"></i> Bimbingan Laporan PKPM</a>
            </li>
            @endif
            <li>
              <a href="{{ route('uploadLapranPKPM')}}" class="active"><i class="fa fa-upload fa-fw"></i> Upload Laporan PKPM</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">@yield('header_content')</h1>
          </div>
        </div>
        <div class="row ">
          @yield('content')

          <div class="col-lg-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> Berita Terbaru
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                @foreach ($beritas as $data)
                <div class="list-group">
                  <a href="{{ route('downloadinsekjur', ['berita',$data['file']]) }}" class="list-group-item">
                    <i class="fa fa-download fa-fw"></i> {{$data['namaBerita']}}
                  </a>
                </div>
                @endforeach
              </div>
              <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- jQuery -->
  <script src="{{ url('./newasset/js/jquery.min.js')}}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{{ url('./newasset/js/bootstrap.min.js')}}"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="{{ url('./newasset/js/metisMenu.min.js')}}"></script>

  <!-- Morris Charts JavaScript -->
  <script src="{{ url('./newasset/js/raphael.min.js')}}"></script>
  <script src="{{ url('./newasset/js/morris.min.js')}}"></script>
  <script src="{{ url('./newasset/js/morris-data.js')}}"></script>

  <!-- DataTables JavaScript -->
    <script src="{{ url('./newasset/js/dataTables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ url('./newasset/js/dataTables/dataTables.bootstrap.min.js')}}"></script>

  <!-- Custom Theme JavaScript -->
  <script src="{{ url('./newasset/js/startmin.js')}}"></script>
</body>

</html>