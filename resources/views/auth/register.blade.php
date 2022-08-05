@extends('layouts.app')

@section('title')
Login
@endsection

@section('links')
	<link rel="icon" type="image/png" href="{{ asset('auth/images/icons/favicon.ico') }}"/>

	<link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/bootstrap/css/bootstrap.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/animate/animate.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/css-hamburgers/hamburgers.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/animsition/css/animsition.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/daterangepicker/daterangepicker.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('auth/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('auth/css/main.css') }}">
@endsection

@section('style')
<style>

    #sticker-sticky-wrapper{
        background-color: black;
    }
</style>
@endsection



@section('content')

	{{-- <div class="limiter">
		<div class="container-login100"> --}}
			<div class="wrap-login100">
				<form class="login100-form validate-form m-auto" action="{{ route('register') }}" method="POST">

                    @csrf
					<span class="login100-form-title p-b-43" style="color: #36e48d">
						Inscription
					</span>

                    @error('name')
                        <span style="display: block;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100 @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}">
						<span class="focus-input100"></span>
						<span class="label-input100">Nom et Prénom</span>
					</div>

                    @error('email')
                        <span style="display: block;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100 @error('email') is-invalid @enderror" type="text" name="email"  value="{{ old('email') }}">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>

                    @error('password')
                        <span style="display: block;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100 @error('name') is-invalid @enderror" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password_confirmation">
						<span class="focus-input100"></span>
						<span class="label-input100">Confirmation password</span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="flex-sb-m w-full p-t-3 p-b-32 mt-3">
						{{-- <div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div> --}}

						<div>
							<a href="{{ route('login') }}" class="txt1 text-primary">
								J'ai deja un compte
							</a>
						</div>
					</div>

				</form>

				{{-- <div class="login100-more" style="background-image: url('{{ asset('auth/images/bg-01.jpg') }}');">
				</div> --}}
			</div>
		</div>
	</div>
@endsection


@section('scripts')
	<script src="{{ asset('auth/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('auth/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('auth/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth/js/main.js') }}"></script>
@endsection
