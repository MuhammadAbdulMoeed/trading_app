<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <title>Tradings App Register</title>
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
								<p class="mb-0">World of Trading 2023, Frankfurt</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		@if (count($errors) > 0)
			  <div class = "alert alert-danger">
				  <ul>
					  @foreach ($errors->all() as $error)
						  <li>{{ $error }}</li>
					  @endforeach
				  </ul>
			  </div>
		@endif

		<form class="form-wrapper" method="POST" action="{{ route('register') }}">
            @csrf
			<section class="auth-form-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 mb-3">
							<div class="form-title">
								<h2>Participant Information</h2>
								<p id="error-message" class="error-message"></p>
							</div>
						</div>
						<div class="col-lg-12 mb-3">
							<div class="form-input-wrapper">
								<label class="d-block mb-2">Name</label>
								<input type="text" name="name" value="{{old('name')}}" class="infoInputs" id="name" placeholder="Your Name" required autofocus>
								@error('name')
									<div class="invalid-feedback">{{$message}} {{ $error }}</div>
								@enderror

							</div>
						</div>

						<div class="col-lg-12 mb-3">
							<div class="form-input-wrapper">
								<label class="d-block mb-2">Email Address </label>
								<input type="email" name="email" id="email"  value="{{old('email')}}" class="infoInputs emailinfo"  placeholder="Your Email" required>
								@error('email')
									<div class="invalid-feedback">
									{{$message}} {{ $error }}
										<!--<span id="emailerror" class="email-error">Please Enter Correct Email</span>-->
									</div>
								@enderror
							</div>
						</div>

						<div class="col-lg-12 mb-3">
							<div class="form-input-wrapper">
								<label class="d-block mb-2">Password </label>
								<input type="password" name="password" class="infoInputs" id="user-password" placeholder="Your Password" required>
							</div>
						</div>

						<div class="col-lg-12 mb-3">
							<div class="form-input-wrapper">
								<label class="d-block mb-2">Confirm Password </label>
								<input id="password_confirmation" type="password" name="password_confirmation" class="infoInputs" placeholder="Confirm Password" required>
								@error('password_confirmation')
									<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
						</div>

					</div>
				</div>
			</section>

			<hr class="hr-border">
			<section class="auth-form-wrapper mt-2">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 mb-3">
							<div class="form-input-wrapper p-0">
								<label class="d-block mb-0 withpad">Age Group</label>
								<select name="age_group" class="chzn-select" id="ageGroup">
								  <option value="">Select Age Group</option>
								  <option value="8-25 years old">8-25 years old</option>
								  <option value="26-35 years old">26-35 years old</option>
								  <option value="36-45+ years old">36-45+ years old</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12 mb-3">
							<div class="form-input-wrapper p-0">
								<label class="d-block mb-0 withpad">Trading Experience</label>
								<select name="trade_experience" class="chzn-select" id="tradingExp">
								  <option value="">Select Trading Experience</option>
								  <option value="beginner-trader">Beginner Trader</option>
								  <option value="intermediate-trader">Intermediate Trader</option>
								  <option value="experienced-trader">Experienced Trader</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</section>




			<section class="agrement-cb-wrapper mt-4">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="auth-cb-wrapper">
								<input type="checkbox" id="authCB_01"  name="terms" value="1" class="formRadioInputsBtn">
								<label for="authCB_01" class="formRadioLabelBtn">
									<div class="auth-cb-content-wrapper">
										<div class="auth-cb error-auth-cb">
											<span></span>
										</div>
										<div class="auth-cb-content">
											<p>I agree to my email being used for future marketing purposes, and to receive communication from and about IV-Capital GmbH and related entities.</p>
										</div>
									</div>
								</label>
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
								<button type="submit">Sign Up</button>
							</div>
						</div>
						<div class="col-lg-12 mt-3">
							<div class="account-check text-center">
								<p>Already have an account. <a href="{{url('/login')}}">Sign In</a></p>
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
</script>


<script>
	$(document).ready(function() {
		$(".form-input-wrapper input.infoInputs").on("focus", function() {
			$(this).closest(".form-input-wrapper").addClass("input-focused");
		});

		$(".form-input-wrapper input.infoInputs").on("blur", function() {
			$(this).closest(".form-input-wrapper").removeClass("input-focused");
			checkFields();
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



		function checkFields() {
			var nameValue = $("#name").val();
			var emailValue = $("#email").val();
			var ageGroupValue = $("#ageGroup").val();
			var tradingExpValue = $("#tradingExp").val();
			var isCheckboxChecked = $("#authCB_01").is(":checked");
			var missingFields = [];
			if (nameValue === "") {
				missingFields.push("Name, Surname");
			}
			if (emailValue === "") {
				missingFields.push("Email Address");
			}
			if (ageGroupValue === "") {
				missingFields.push("Age Group");
			}
			if (tradingExpValue === "") {
				missingFields.push("Trading Experience");
			}
			if (missingFields.length === 0 && isCheckboxChecked) {
				$(".auth-submit-btn button").prop("disabled", false);
				$(".auth-cb").removeClass("error-auth-cb");
				$("#error-message").text("");
			} else {
				$(".auth-submit-btn button").prop("disabled", true);
				$(".auth-cb").addClass("error-auth-cb");
				if (!isCheckboxChecked) {
					$("#error-message").text("Please check the agreement checkbox.");
				} else {
					$("#error-message").text("Please fill out the following field(s) " + missingFields.join(", "));
				}
			}
		}

		$("#authCB_01").on("change", function() {
			checkFields();
		});


	});
</script>
</body>
</html>
