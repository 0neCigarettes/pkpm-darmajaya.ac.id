<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{ url('/regis/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{ url('/regis/css/style.css')}}">
	</head>

	<body>

		<div class="wrapper" style="background: #293860;">
			<div class="inner">
				<div class="image-holder">
					<img src="{{ url('statics/dj1.png')}}" alt="">
				</div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
					<h3>Registrasi Akun Anda</h3>
					<div class="form-wrapper">
                        <input id="name" type="text" placeholder="Nama Lengkap" name="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <i class="zmdi zmdi-card"></i>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>
					<div class="form-wrapper">
                        <input id="username" placeholder="Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>
                        <i class="zmdi zmdi-account"></i>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>
                    <div class="form-wrapper">
                        <select name="jurusan"  class="form-control" required>
                            <option value="">Pilih Jurusan</option>
                            <option value="Tehnik Informatika">Tehnik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Sistem Komputer">Sistem Komputer</option>
                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Bisnis Digital">Bisnis Digital</option>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        @error('jurusan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
					<div class="form-wrapper">
                        <input id="email" placeholder="Alamat E-Mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <i class="zmdi zmdi-email"></i>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>
					<div class="form-wrapper">
                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <i class="zmdi zmdi-lock"></i>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>
					<div class="form-wrapper">
                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button type="submit" class="btn btn-primary">Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
        
	</body>
</html>