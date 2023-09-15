<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Tradings App Register</title>
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
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/pages/account-register.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/style.css')}}">

</head>


 <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
			<section id="account-register" class="flexbox-container">
				<div class="col-12 d-flex align-items-center justify-content-center">
					<!-- image -->
					<div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 col-12 p-0 text-center d-none d-md-block">
						<div class="border-grey border-lighten-3 m-0 box-shadow-0 card-account-left height-500">
							<img src="{{asset('admin-assets/images/pages/account-login.png')}}" class="card-account-img width-200" alt="card-account-img">
						</div>
					</div>
					<!-- login form -->
					<div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 col-12 p-0">
						<div class="card border-grey border-lighten-3 m-0 box-shadow-0 card-account-right height-500">
							<div class="card-content">
								<div class="card-body p-3">
									<p class="text-center h5 text-capitalize">Started with Tradings App</p>
									<p class="mb-3 text-center">Create your account</p>
									 @if (count($errors) > 0)
										  <div class = "alert alert-danger">
											  <ul>
												  @foreach ($errors->all() as $error)
													  <li>{{ $error }}</li>
												  @endforeach
											  </ul>
										  </div>
									  @endif
									<form class="form-horizontal form-signin" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <fieldset class="form-label-group">
											<input type="text" name="name" value="{{old('name')}}" class="form-control" id="user-name" placeholder="Your Name" required autofocus>
											<label for="user-name">Name</label>
											 @error('name')
												<div class="invalid-feedback">{{$message}} {{ $error }}</div>
											  @enderror
										</fieldset>

										<fieldset class="form-label-group">
											<input type="email" name="email" id="email"  value="{{old('email')}}" class="form-control"  placeholder="Your Email" required>
											<label for="user-name">Email</label>
											@error('email')
												<div class="invalid-feedback">{{$message}} {{ $error }}</div>
											@enderror
										</fieldset>
										<fieldset class="form-label-group">
											<input type="password" name="password" class="form-control" id="user-password" placeholder="Your Password" required>
											<label for="user-password">Password</label>
											@error('password')
											  <div class="invalid-feedback">{{$message}}</div>
											 @enderror
										</fieldset>

										<fieldset class="form-label-group">
											<input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
											<label for="user-password">Confirm Password</label>
											@error('password_confirmation')
											  <div class="invalid-feedback">{{$message}}</div>
											@enderror
										</fieldset>
										<div class="form-group row">
											<div class="col-12 text-center text-sm-left">
												<fieldset>
													<input name="terms" value="1"  type="checkbox" id="remember-me" class="chk-remember" required >
													<label for="remember-me"> I agree to terms and conditions</label>
												</fieldset>
											</div>
										</div>
										<button type="submit" class="btn-gradient-primary btn-block my-1">Sign Up</button>

										<p class="text-center"><a href="{{url('/login')}}" class="card-link">Log In</a></p>
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
