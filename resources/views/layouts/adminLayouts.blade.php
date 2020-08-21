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

  
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>

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
      <div class="navbar-header">
          <a class="navbar-brand">PKPM Darmajaya/Admin</a>
      </div>

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown navbar-inverse">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }}<b class="caret"></b>
          </a>
          <ul class="dropdown-menu dropdown-user">
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
            <a href="{{ route('cekRegistrasiPKPM')}}" class="active"><i class="fa fa-edit fa-fw"></i> Data Mahasiswa PKPM</a>
            </li>
            <li>
              <a href="{{ route('lihatLaporan')}}"><i class="fa fa-table fa-fw"></i> Laporan PKPM Mahasiswa</a>
            </li>
            <li>
              <a href="{{ route('indexPanduan')}}"><i class="fa fa-upload fa-fw"></i> Upload Panduan PKPM</a>
            </li>
            <li>
              <a href="{{ route('indexBerita')}}"><i class="fa fa-upload fa-fw"></i> Upload Berita PKPM</a>
            </li>
            <li>
              <a href="{{ route('observasi')}}"><i class="fa fa-upload fa-fw"></i> Upload panduan observasi</a>
            </li>
            <li>
              <a href="{{ route('addIndex')}}"><i class="fa fa-edit fa-fw"></i> Tambah Akun Sekjur</a>
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
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
          @yield('content')
        </div>
        <!-- /.row -->
      </div>

    </div>

  </div>

  <script type="text/javascript" language="javascript">
        function konfirmasi () {
            var pilihan = confirm ("Apakah Anda Yakin Menghapus Data ?");
            if(pilihan)
			{
                return true
            }else
				{
                alert ("Proses Di Batalkan")
                return false
                }
			}
		</script>
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

  <!-- Custom Theme JavaScript -->
  <script src="{{ url('./newasset/js/startmin.js')}}"></script>

  {{-- <script src="{{ url('./newasset/js/jquery-3.1.0.js')}}"></script>
  
  <script src="{{ url('./newasset/js/jquery.dataTables.min.js')}}"></script> --}}

  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

</body>

</html>