<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kecamatan Mendahara Ulu</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('assets_login/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
	<!-- Favicons -->
	<link href="{{asset('Gambar/Logo/favicon.png')}}" rel="icon">
	<link href="{{asset('Gambar/Logo/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('assets_login/css/style.css')}}">
</head>
<body>
    @if(session('alert'))
      <script>
        alert('Anda tidak boleh memasuki halaman tersebut');
      </script>
    @endif
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{asset('assets_login/images/logo1.png')}}" alt=""></figure>
                        <figure><img src="{{asset('assets_login/images/keren.png')}}" alt=""></figure>
                       
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Masuk</h2>
                        <form method="POST" class="register-form" action="{{ route('login') }}" id="login-form">
                        @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email"/>
                                @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Kata Sandi"/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if (Route::has('password.request'))
                            <div class="form-group">
                            Lupa Kata Sandi?<a href="{{ route('password.request') }}"> Klik Disini</a>
                            </div>
                            @endif
                            <div class="form-group form-button">
                                <input type="submit" class="form-submit" value="Masuk"/>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="{{asset('assets_login/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets_login/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
