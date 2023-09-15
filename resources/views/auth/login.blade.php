<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/js/vendor/chosen/chosen.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
</head>
<body>

	<main>
		<section class="auth-header-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="auth-header-plceholder">
							<div class="auth-header-logo">
								<img src="{{asset('assets/imgs/desktop-logo.png')}}" class="img-fluid">
							</div>
							<div class="auth-header-content ps-3">
								<h4 class="mb-1">Trading Contest</h4>
								<p class="mb-0">World of Trading {{date('Y')}}, Frankfurt</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<form class="form-wrapper" method="POST" action="{{ route('login') }}">
            @csrf
			<section class="auth-form-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 mb-3">
							<div class="form-title">
								<h2>Participant Sign In</h2>
								<p id="error-message" class="error-message"></p>
							</div>
						</div>
					<!--	<div class="col-lg-12 mb-3">
							<div class="form-input-wrapper">
								<label class="d-block mb-2">Name</label>
								<input type="text" name="" id="name" class="infoInputs">
							</div>
						</div>
						-->
						<div class="col-lg-12 mb-3">
							<div class="form-input-wrapper">
								<label class="d-block mb-2">Email Address </label>

								<input type="email" name="email" :value="old('email')" class="infoInputs emailinfo" id="email" placeholder="Your Email" required autofocus>

								@if ($errors->has('email'))
									<span class="invalid-feedback">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@else
									@error('email')
									<div class="invalid-feedback">{{$message}}</div>
									@enderror
								@endif
							</div>
						</div>

						<div class="col-lg-12 mb-3">
							<div class="form-input-wrapper">
								<label class="d-block mb-2">Password</label>
								<input name="password" type="password" class="form-control" id="user-password" required autocomplete="current-password" placeholder="Enter Password">
								@error('password')
									<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
						</div>

						<div class="col-lg-12 mb-3">
							<div class="form-input-wrapper">
								<label class="d-block mb-2">Remember</label>
								<input type="checkbox" name="remember" id="remember-me" class="chk-remember">
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="auth-submit-wrapper mt-5">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="auth-submit-btn">
								<button type="submit">Sign In</button>
							</div>
						</div>
						<!--
						<div class="col-md-6 col-12 float-sm-left text-center text-sm-right">
							<a href="{{ route('password.request') }}"class="card-link">Forgot Password?</a>
						</div>
						-->
						<div class="col-lg-12 mt-3">
							<div class="account-check text-center">
								<p>Don't have an account. <a href="{{url('/register')}}">Sign Up</a></p>
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
	</main>



<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/chosen/chosen.jquery.js')}}"></script>

<script type="text/javascript">

	$(".chzn-select").chosen({
		disable_search:true,
	});

	$(document).ready(function() {

		$(".form-input-wrapper input.infoInputs").on("focus", function() {
			$(this).closest(".form-input-wrapper").addClass("input-focused");
		});

		$(".form-input-wrapper input.infoInputs").on("blur", function() {
			$(this).closest(".form-input-wrapper").removeClass("input-focused");
		});

		$('.emailinfo').blur(function() {

			const email = $(this).val();

			const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

			if (emailPattern.test(email)) {
				$(this).parent(".form-input-wrapper").removeClass('check-email');
				$("#emailerror").hide();
			} else {
				$(this).parent(".form-input-wrapper").addClass('check-email');
				$("#emailerror").show();
			}
		});

	});

</script>
</body>
</html>
