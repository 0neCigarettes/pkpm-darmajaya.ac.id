<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PKPM@Darmajaya.ac.id</title>

  <!-- Font Icon -->
  <link rel="stylesheet" href="{{ url('asset/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

  <!-- Main css -->
  <link rel="stylesheet" href="{{ url('asset/css/style.css')}}">

</head>

<body style="background-color: #293860;">

  <div style="background-color: #293860;" class="main">

    <!-- Sing in  Form -->
    <section class="sign-in">
      <div class="container">
        <div class="signin-content">
          <div class="signin-image">
            <figure><img src="asset/images/signin-image.jpg" alt="sing up image"></figure>
            <a href="{{ route('register')}}" class="signup-image-link">Buat Akun</a>
          </div>
          <div class="signin-form">
            <h2 class="form-title">LogIn</h2>
            <form method="POST" action="{{ route('login')}}">
              @csrf
              <div class="form-group">
                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="username" id="username" placeholder="User Name" />
                @error('username')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="label-agree-term"><span><span></span></span>Ingatkan Saya</label>
              </div>
              @error('username')
              <span class="invalid-feedback" role="alert">
                <strong>Username / Password Salah !</strong>
              </span>
              @enderror
              <div class="form-group form-button">
                <button style="background-color: #368ee0;" type="submit" class="form-submit"> Log In</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </div>

  <!-- JS -->
  <script src="{{ url('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ url('js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>