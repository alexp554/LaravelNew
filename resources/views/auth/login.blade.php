<!doctype html>
<html lang="en">
<head>
<title>JDV Visitor</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="{{asset('loginForm/css/style.css')}}">
<!-- Toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>

<style>
.bgr {
  background-image: url("{{asset('gambar/login-register.jpg')}}");
  background-size: cover;
}
</style>

<body class="bgr">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to the JDV login page</h2>
								<p>Don't have an account?</p>
								<a href="{{ route('register') }}" class="btn btn-white btn-outline-white">Sign Up</a>
							</div>
						</div>
						<div class="login-wrap p-4 p-lg-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">{{ __('Login') }}</h3>
								</div>
							</div>
							<form method="POST" action="{{ route('login') }}" class="signin-form">
								@csrf
								<div class="form-group mb-3">
									<label class="label" for="email">{{ __('E-Mail Address') }}</label>
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="mail@jogjadigitalvalley.com" required>
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password">{{ __('Password') }}</label>
									<input  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="********">
									
									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary submit px-3">{{ __('Login') }}</button>
								</div>
								<div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0" for="remember">{{ __('Remember Me') }}
										<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
										<span class="checkmark"></span>
										</label>
									</div>

									@if (Route::has('password.request'))
										<div class="w-50 text-md-right">
											<a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
										</div>
									@endif
									
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<script src="{{asset('loginForm/js/jquery.min.js')}}"></script>
<script src="{{asset('loginForm/js/popper.js')}}"></script>
<script src="{{asset('loginForm/js/bootstrap.min.js')}}"></script>
<script src="{{asset('loginForm/js/main.js')}}"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
@foreach ($errors->all() as $error)
  toastr.error("{{$error}}")
@endforeach
</script>

</body>
</html>