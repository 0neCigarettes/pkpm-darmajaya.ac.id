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

<body>

  <div class="main">

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
            <form method="POST" action="{{ route('login') }}">
              <div class="form-group">
                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="your_name" id="your_name" placeholder="User Name" />
              </div>
              <div class="form-group">
                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                <input type="password" name="your_pass" id="your_pass" placeholder="Password" />
              </div>
              <div class="form-group">
                <input type="checkbox" name="remember" id="remember" class="agree-term" />
                <label for="remember" class="label-agree-term"><span><span></span></span>Ingatkan Saya</label>
              </div>
              <div class="form-group form-button">
                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
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