<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trade Results</title>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link href="{{asset('admin-assets/css/toastr.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('assets/imgs/fav.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('assets/imgs/fav.png')}}" />
</head>
<body>

	<main>
		<section class="app-header-wrapper">
			<section class="desktop-header-wrapper d-sm-none d-none d-md-none d-lg-block">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-2">
							<div class="desktop-header-logo">
								<div class="logo-wrapper">
									<img src="{{asset('assets/imgs/desktop-logo.png')}}" class="img-fluid">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="header-tag-content-wrapper">
								<div class="header-tag-stars">
									<img src="{{asset('assets/imgs/group-stars.png')}}">
                                    <p class="mb-0 mt-1">{{$positions}}/{{$totalUsers}}</p>
								</div>
								<div class="header-tag-content text-center">
									<p class="mb-0">Join our trading challenge and have a chance at winning valuable prizes!</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="trading-target-wrapper">
								<div class="trading-target-content text-center">
									<h2>{{$total}}</h2>
                                    @if(isset($user_type) && $user_type == 1)
									    <p class="mb-0">Total Participants</p>
                                    @else
                                        <p class="mb-0">Total Trades</p>
                                    @endif
								</div>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="trading-close-wrapper">
								<div class="trading-close-content text-center">
{{--									<h2>01:08:55</h2>--}}

                                    <div id="countdown">
                                        <h4 style="color: white;">
                                            <span id="hours"></span> : <span id="minutes"></span> : <span id="seconds"></span>
                                        </h4>
                                    </div>
									<p class="mb-0">Until Trading Closes</p>
								</div>
							</div>
						</div>

                        <div class="col-lg-1">
                            {{--<div class="trading-close-wrapper">--}}
                            <div class="btn-group">
                                <button type="button" id="initials" class="NavLetters" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action md
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"  href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    {{--<li>
                                        <a class="dropdown-item"  href="{{route('graph')}}">Graph Dashboard</a>
                                    </li>--}}
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="ft-power"></i> Logout</a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            {{--						</div>--}}
                        </div>
					</div>
				</div>
			</section>

			<section class="mobile-header-wrapper d-sm-block d-block d-md-block d-lg-none">
				<div class="container">
					<div class="row align-items-center gx-2" >
						<div class="col-3">
							<div class="mobile-log-wrapper">
								<div class="mobile-logo">
									<img src="{{asset('assets/imgs/desktop-logo.png')}}" class="img-fluid">
								</div>
							</div>
						</div>
						<div class="col-2">
							<div class="star-wrapper">
								<div class="star-content text-center">
									<img src="assets/imgs/group-stars.png" class="img-fluid">
									<!--<p class="mb-0 mt-1">8/279</p>-->
                                    <p class="mb-0 mt-1">{{$positions}}/{{$totalUsers}}</p>
								</div>
							</div>
						</div>
						<div class="col-4">
							<div class="account-balacnce">
								<div class="account-balacnce-content text-center">
									<h4 class="mb-1">{{$total}}</h4>
									<p class="mb-0">Total Participants</p>
								</div>
							</div>
						</div>
                        <div class="col-2">
                            <div class="btn-group">
                                <button type="button" id="initials2" class="NavLetters" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action md
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"  href="{{route('dashboard')}}">Trades Dashboard</a>
                                    </li>
                                    {{--<li>
                                        <a class="dropdown-item"  href="{{route('graph')}}">Graph Dashboard</a>
                                    </li>--}}
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="ft-power"></i> Logout</a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
					</div>
				</div>

				<div class="remining-time-wrapper">
					<div class="remining-time-content">
{{--						<h4>01:08:55</h4>--}}
                        <div id="countdown2" class="timerFontSize">
                            <h4>
                                <span id="hours1"></span> : <span id="minutes1"></span> : <span id="seconds1"></span>
                            </h4>
                        </div>
						<p>Until Trading Closes</p>
					</div>
				</div>
			</section>

		</section>

		<!-- Table Wrapper -->
		<section class="participants-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="participants-tale-wrapper">
							<div class="table-responsive">
								<table class="table">
									<thead>
                                        @if(isset($user_type) && $user_type == 1)
                                            <tr>
                                                <th scope="col">Position</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Current Balance</th>
                                                <th scope="col"><span class="profit-td">Profit</span> / <span class="lost-td">Loss</span></th>
                                            </tr>
                                        @else
                                            <tr>
                                                <th scope="col">Sr.#</th>
                                                <th scope="col">Remaining Balance</th>
                                                <th scope="col"><span class="profit-td">Profit</span> / <span class="lost-td">Loss</span></th>
                                                <th scope="col">Date</th>
                                            </tr>
                                        @endif
									</thead>
									<tbody>
                                        @if(isset($userTradeHistory))

                                            @foreach($userTradeHistory as $history)

                                                @if(isset($user_type) && $user_type == 1)
                                                <tr>
                                                    <td class="trading-positin">#{{$loop->iteration}}</td>
                                                    <td>
                                                        @php
                                                            $string     = $history->user->name ?? "";
                                                            // Split the string by space
                                                            $parts      =  explode(' ', $string);
                                                            if (count($parts) >= 2) {
                                                                // Take the first part as is
                                                                $before_space = $parts[0];
                                                                // Take the first character from the second part
                                                                $after_space = substr($parts[1], 0, 1);
                                                                // Combine the results
                                                                $result = $before_space . ' ' . $after_space;
                                                            } else {
                                                                // Handle cases where there's no space in the string
                                                                $result = $string;
                                                            }
                                                        @endphp
                                                        {{$result}}
                                                    </td>
                                                    <td> $ {{round($history->final_amount,2)}}</td>
                                                    @if($history->trade_final_effect == "Profit")
                                                        <td class="profit-td">$ {{$history->trade_closing_amount}}</td>
                                                    @else
                                                        <td class="lost-td">$ {{$history->trade_closing_amount}}</td>
                                                    @endif
                                                </tr>
                                                @else
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>

                                                    <td>$ {{round($history->final_amount)}}</td>

                                                    @if($history->trade_final_effect == "Profit")
                                                        <td class="profit-td">$ {{$history->trade_closing_amount}}</td>
                                                    @else
                                                        <td class="lost-td">$ {{$history->trade_closing_amount}}</td>
                                                    @endif

                                                    <td> {{$history->created_at->format('d-M-y h:i:s')}}</td>

                                                </tr>
                                                @endif
                                            @endforeach
                                        @endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<script src="{{asset('assets/js/jquery.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script type="text/javascript">

        // const name = document.getElementById("initials");
        // const words = name.textContent;
        // const letters = words.split(" ");
        // let initials = "";

        // for (const word of letters) {
        //     if (word.length > 0) {
        //         initials += word.charAt(0);
        //     }
        // }
        // document.getElementById("initials").textContent = initials;

        // const name2 = document.getElementById("initials2");
        // const words2 = name2.textContent;
        // const letters2 = words2.split(" ");
        // let initials2 = "";

        // for (const word2 of letters2) {
        //     if (word2.length > 0) {
        //         initials2 += word2.charAt(0);
        //     }
        // }
        // document.getElementById("initials2").textContent = initials2;

    </script>

    @include('customer.js')

</body>

</html>
