@extends('layouts.form')
@section('content')
<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
	@csrf
	<span class="login100-form-title p-b-49">
		Daftar
	</span>

	<div class="wrap-input100 validate-input m-b-23" data-validate = "Nama is required">
		<span class="label-input100">Nama Pengguna</span>
		<input class="input100  @error('username') is-invalid @enderror"  placeholder="Masukan Nama Pengguna" id="username" type="text"  name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
		
		<span class="focus-input100" data-symbol="&#xf206;"></span>
		@error('username')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>

	<div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
		<span class="label-input100">E-mail</span>
		<input class="input100  @error('email') is-invalid @enderror"  placeholder="Masukan E-mail" id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
		
		<span class="focus-input100" data-symbol="&#xf206;"></span>
		@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>

	<div class="wrap-input100 validate-input  m-b-23" data-validate="Password is required">
		<span class="label-input100">Kata Sandi</span>
		<input class="input100" type="password" id="password" name="password" autocomplete="new-password" placeholder="Masukan kata sandi">
		<span class="focus-input100" data-symbol="&#xf190;"></span>
		@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
	
	<div class="wrap-input100 validate-input  m-b-23" data-validate="Password is required">
		<span class="label-input100">Ulangi Kata Sandi</span>
		<input class="input100" type="password" id="password-confirm" name="password_confirmation" autocomplete="new-password" placeholder="Ulangi kata sandi">
		<span class="focus-input100" data-symbol="&#xf190;"></span>
		
	</div>
	
	<div class="container-login100-form-btn">
		<div class="wrap-login100-form-btn">
			<div class="login100-form-bgbtn"></div>
			<button type="submit" class="login100-form-btn">
			{{ __('Daftar') }}
			</button>
		</div>
	</div>

	<div class="flex-col-c p-t-20">
		<span class="txt1 p-b-17">
			Sudah Memiliki akun?
		</span>

		<a href="{{ route('login') }}" class="txt2">
			Klik Masuk
		</a>
	</div>
</form>
@stop