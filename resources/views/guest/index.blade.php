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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
<style>
    h1{
    font-family: sans-serif;
    font-weight: normal;
    color: white;
  }

  div{
    font-family: Sans-Serif;
  }

  .malasngoding-slider { 
    border: 10px solid #efefef; 
    position: relative; 
    overflow: hidden; 
    background: #efefef;
  }

  .malasngoding-slider { 
    margin:20px auto;
    width: 768px;
    height: 450px; 
  }

  .isi-slider img { 
    width: 768px;
    height: 450px; 
    float: left;
  }

  .isi-slider { 
    position: absolute; 
    width:3900px;  

    /*pengaturan durasi lama tampil gambar bisa di atur di bawah ini*/
    animation-name:slider;
    animation-duration:8s;
    animation-timing-function: ease-in-out;
    animation-iteration-count:infinite;
    -webkit-animation-name:slider;
    -webkit-animation-duration:10s;
    -webkit-animation-timing-function: ease-in-out;
    -webkit-animation-iteration-count:infinite;
    -moz-animation-name:slider;
    -moz-animation-duration:10s;
    -moz-animation-timing-function: ease-in-out;
    -moz-animation-iteration-count:infinite;
    -o-animation-name:slider;
    -o-animation-duration:16s;
    -o-animation-timing-function: ease-in-out;
    -o-animation-iteration-count:infinite;
  }


  /*saat gambar di hover oleh cursor mouse maka berhenti slide*/
  .isi-slider:hover { 
    -webkit-animation-play-state:paused; 
    -moz-animation-play-state:paused; 
    -o-animation-play-state:paused; 
    animation-play-state:paused; }
  }

  .isi-slider img { 
    float: right; 
  }

  .malasngoding-slider:after { 
    font-size: 150px; 
    position: absolute; 
    z-index: 12; 
    color: rgba(255,255,255, 0); 
    left: 300px; top: 80px; 
    -webkit-transition: 1s all ease-in-out; 
    -moz-transition: 1s all ease-in-out; 
    transition: 1s all ease-in-out; 
  }

  .malasngoding-slider:hover:after { 
    color: rgba(255,255,255, 0.6);  
  }



  @-moz-keyframes slider {     
    0% {
      left: 0; opacity: 0; 
    }     
    2% {
      opacity: 1; 
    }     
    20% {
      left: 0; opacity: 1; 
    }     
    21% {
      opacity: 0; 
    }     
    24% {
      opacity: 0; 
    }     
    25% {
      left: -768px; opacity: 1; 
    }       
    45% {
      left: -768px; opacity: 1; 
    }     
    46% {
      opacity: 0; 
    }     
    48% {
      opacity: 0; 
    }     
    50% {
      left: -1536px; opacity: 1; 
    }     
    70% {
      left: -1536px; opacity: 1; 
    }     
    72% {
      opacity: 0; 
    }     
    74% {
      opacity: 0; 
    }    
    75% {
      left: -2304px; opacity: 1; 
    }   	
    95% {
      left: -2304px; opacity: 1; 
    }   	
    97% { 
      left: -2304px; opacity: 0;
    }   	
    100% {
      left: 0; opacity: 0; 
    }
  } 

  @-webkit-keyframes slider {     
    0% {
      left: 0; opacity: 0; 
    }     
    2% {
      opacity: 1; 
    }     
    20% {
      left: 0; opacity: 1; 
    }     
    21% {
      opacity: 0; 
    }     
    24% {
      opacity: 0; 
    }     
    25% {
      left: -768px; opacity: 1; 
    }       
    45% {
      left: -768px; opacity: 1; 
    }     
    46% {
      opacity: 0; 
    }     
    48% {
      opacity: 0; 
    }     
    50% {
      left: -1536px; opacity: 1; 
    }     
    70% {
      left: -1536px; opacity: 1; 
    }     
    72% {
      opacity: 0; 
    }     
    74% {
      opacity: 0; 
    }    
    75% {
      left: -2304px; opacity: 1; 
    }   	
    95% {
      left: -2304px; opacity: 1; 
    }   	
    97% { 
      left: -2304px; opacity: 0;
    }   	
    100% {
      left: 0; opacity: 0; 
    }
  } 


  @keyframes slider {     
    0% {
      left: 0; opacity: 0; 
    }     
    2% {
      opacity: 1; 
    }     
    20% {
      left: 0; opacity: 1; 
    }     
    21% {
      opacity: 0; 
    }     
    24% {
      opacity: 0; 
    }     
    25% {
      left: -768px; opacity: 1; 
    }     
    45% {
      left: -768px; opacity: 1; 
    }     
    46% {
      opacity: 0; 
    }     
    48% {
      opacity: 0; 
    }     
    50% {
      left: -1536px; opacity: 1; 
    }     
    70% {
      left: -1536px; opacity: 1; 
    }     
    72% {
      opacity: 0; 
    }     
    74% {
      opacity: 0; 
    }    
    75% {
      left: -2304px; opacity: 1; 
    }   	
    95% {
      left: -2304px; opacity: 1; 
    }   	
    97% { 
      left: -2304px; opacity: 0; 
    } 

    100% {
      left: 0; opacity: 0; 
    }
  }
</style>
</head>

<body>
  <div id="wrapper">
    <div class="col-lg-10">
      <!-- Navigation -->
      <div class="col-lg-offset-2" style="background: white; margin-top: ;" >
          <div class="container-fluid">
            <div class="row text-white" style="background: #325db2">
              <div class="col-lg-12" style="background: #325db2">
                <h1 class="page-header"><b>PKPM Darmajaya</b></h1>
              </div>
              <div class="panel tabbed-panel panel-primary" style="background: #325db2">
                <div class="panel-heading clearfix" style="background: #325db2">
                  <div class="pull-left">
                    <ul class="nav nav-tabs">
                      <li><a href="{{ route('berita')}}">HOME</a></li>
                      <li><a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PROFILE</a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background: white;">
                            <a class="dropdown-item" href="{{ route('pkpm')}}">PKPM</a><br>
                            <a class="dropdown-item" href="{{ route('kkn')}}">KKN Fakultas</a>
                          </div>
                      </li>
                      <li><a href="{{ route('observasiInGuest')}}">FORM OBSERASI BAGI PESERTA PKPM</a></li>
                      <li><a href="{{ route('kontak')}}">CONTAK</a></li>
                      <li><a href="{{ route('login')}}">LOGIN</a></li>
                    </ul>
                  </div>
                </div>
                <div class="malasngoding-slider">
                  <div class="isi-slider">
                    <img src="{{ url('file/slide/1.jpeg')}}" alt="Gambar 1">
                    <img src="{{ url('file/slide/2.jpeg')}}" alt="Gambar 2">
                    <img src="{{ url('file/slide/3.jpeg')}}" alt="Gambar 3">
                    <img src="{{ url('file/slide/4.jpeg')}}" alt="Gambar 4">
                    <img src="{{ url('file/slide/5.jpeg')}}" alt="Gambar 5">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-8">
              {{-- Content --}}
              <div style="margin-left: 5%">
                @yield('content')
                <br><br><br>
              </div>
              <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-bell fa-fw"></i> Berita Terbaru
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                  <div class="list-group">
                    @foreach($beritas as $data)
                    <a href="{{ url('file/berita')}}/{{ $data['file'] }}" class="list-group-item">
                      <i class="fa fa-tasks fa-fw"></i> {{$data['namaBerita']}}
                    </a>
                    <br>
                    @endforeach
                  </div>
                  </div>
              </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.col-lg-4 -->
          </div>
          <!-- /.row -->
        <!-- /.container-fluid -->
      </div>
    </div>
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

  <!-- Custom Theme JavaScript -->
  <script src="{{ url('./newasset/js/startmin.js')}}"></script>

</body>
</html>