<!-- - var bodyCustom = 'bg-blue bg-lighten-2' // Use any color palette class--><!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Tradings App Login</title>
    <link rel="apple-touch-icon" href="{{asset('admin-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/forms/icheck/custom.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/app.css')}}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/menu/menu-types/vertical-compact-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/cryptocoins/cryptocoins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/pages/account-login.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/style.css')}}">

</head>
<body class="vertical-layout vertical-compact-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-compact-menu" data-col="1-column">
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
		<section id="account-login" class="flexbox-container">
				<div class="col-12 d-flex align-items-center justify-content-center">
					<!-- image -->
					<div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 col-12 p-0 text-center d-none d-md-block">
						<div class="border-grey border-lighten-3 m-0 box-shadow-0 card-account-left height-400">
							<img src="{{asset('admin-assets/images/pages/account-login.png')}}" class="card-account-img width-200" alt="card-account-img">
						</div>
					</div>
					<!-- login form -->
					<div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 col-12 p-0">
						<div class="card border-grey border-lighten-3 m-0 box-shadow-0 card-account-right height-400">
							<div class="card-content">
								<div class="card-body p-3">
									<p class="text-center h5 text-capitalize">Welcome to Tradings App</p>
									<p class="mb-3 text-center">Please enter your login details</p>
									@if (count($errors) > 0)
                                        <div class = "alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

									<form class="form-horizontal form-signin" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <fieldset class="form-label-group">
											<input type="text" name="email" :value="old('email')" class="form-control" id="user-name" placeholder="Your Email" required autofocus>
											<label for="user-name">Email</label>
											@if ($errors->has('email'))
													  <span class="invalid-feedback">
														<strong>{{ $errors->first('email') }}</strong>
													  </span>
												 @else
													@error('email')
													<div class="invalid-feedback">{{$message}}</div>
													@enderror
												@endif
										</fieldset>
										<fieldset class="form-label-group">
											<input name="password" type="password" class="form-control" id="user-password" required autocomplete="current-password" placeholder="Enter Password">
											<label for="user-password">Password</label>
											@error('password')
												<div class="invalid-feedback">{{$message}}</div>
												@enderror
										</fieldset>
										<div class="form-group row">
											<div class="col-md-6 col-12 text-center text-sm-left">
												<fieldset>
													<input type="checkbox" name="remember" id="remember-me" class="chk-remember">
													<label for="remember-me"> Remember</label>
												</fieldset>
											</div>
											<div class="col-md-6 col-12 float-sm-left text-center text-sm-right">
												<a href="{{ route('password.request') }}"class="card-link">Forgot Password?</a>
											</div>
										</div>
										<button type="submit" class="btn-gradient-primary btn-block my-1">Log In</button>
										<p class="text-center"><a href="{{url('/register')}}" class="card-link">Register</a></p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

        </div>
      </div>
    </div>
    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('admin-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('admin-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>

    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{asset('admin-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/js/core/app.js')}}" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('admin-assets/js/scripts/forms/form-login-register.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- ////////////////////////////////////////////////////////////////////////////-->

</body>
</html>
