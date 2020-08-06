<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ url('./newasset/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- MetisMenu CSS -->
        <link href="{{ url('./newasset/css/metisMenu.min.css')}}" rel="stylesheet" />

        <!-- Custom CSS -->
        <link href="{{ url('./newasset/css/startmin.css')}}" rel="stylesheet" />

        <!-- Custom Fonts -->
        <link
            href="{{ url('./newasset/css/font-awesome.min.css')}}"
            rel="stylesheet"
            type="text/css"
        />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body  style="background: #293860;>
        <div class="container"">
            <div class="row">
                <div class="col-md-4 col-md-offset-4" 
                    style="width: 400px;
                    height: 500px;
                    margin: -250px -200px;
                    position: absolute;
                    left: 50%;
                    top: 35%;
                    background: #293860;
                    border-radius: 0px;">
                    <div class="login-panel" style="background: #234081;">
                            <h1 style="background:#293860;"><img
                                src="{{ url('./statics/logo-siska.png')}}"
                                alt=""
                                style="margin-left: 10%; margin-bottom: 15px;"
                                width="80%"
                                height="80%"
                            /></h1>
                        <div class="panel-body">
                            <form role="form" method="POST" action="{{ route('login') }}">
                                @csrf
                                    <div class="form-group">
                                        <input
                                            @error('username') is-invalid @enderror"
                                            value="{{ old('username') }}"
                                            class="form-control"
                                            placeholder="Username"
                                            name="username"
                                            type="Username"
                                            autocomplete="username"
                                            autofocus
                                            required
                                        />
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ 'Username salah' }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            @error('password') is-invalid @enderror"
                                            class="form-control"
                                            placeholder="Password"
                                            name="password"
                                            type="password"
                                            autocomplete="current-password
                                            required
                                        />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ 'password salah' }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                        <label>
                                            <input
                                                name="remember"
                                                type="checkbox"
                                                {{ old('remember') ? 'checked' : '' }}
                                            /><a style="color: white;"> Remember Me</a>
                                        </label>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"  class="btn btn-primary btn-block">Log In</button>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('register')}}" class="signup-image-link" style="color: white;">Buat Akun</a>
                                    </div>
                                    
                                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ url('./newasset/js/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ url('./newasset/js/bootstrap.min.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ url('./newasset/js/metisMenu.min.js')}}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ url('./newasset/js/startmin.js')}}"></script>
    </body>
</html>
