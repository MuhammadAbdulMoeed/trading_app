<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

    <style>

        .timerFontSize {
            font-weight: normal;
            letter-spacing: .125rem;
            text-transform: uppercase;
        }

    </style>
</head>
<body>

	<main class="main-content-wrapper with-out-graph">
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
                                <div class="header-tag-stars star-content">
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
                                    <h4 class="mb-1" style="color: white;">Balance</h4>
                                    <h2>$ {{ round($balance,2) ?? 0}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="trading-close-wrapper">
                                <div class="trading-close-content text-center">
                                    <div id="countdown">
                                        <h4 style="color: white;">
                                            <span id="hours"></span> : <span id="minutes"></span> : <span id="seconds"></span>
                                        </h4>
                                    </div>
                                    {{--<h2>01:08:55</h2>--}}
                                    <p class="mb-0">Until Trading Closes</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="btn-group">
                                <button type="button" id="initials" class="NavLetters" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action md
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"  href="{{route('trade_results')}}">Trades History</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"  href="{{route('graph')}}">Graph Dashboard</a>
                                    </li>
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
                        <div class="col-3">
                            <div class="star-wrapper">
                                <div class="star-content text-center">
                                    <img src="{{asset('assets/imgs/group-stars.png')}}" class="img-fluid">
                                    <p class="mb-0 mt-1">{{$positions}}/{{$totalUsers}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="account-balacnce">
                                <div class="account-balacnce-content text-center">
                                    <h4 class="mb-1">Balance</h4>
                                    <p class="mb-0">$ {{ round($balance,2) ?? 0}}</p>
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
                                        <a class="dropdown-item"  href="{{route('trade_results')}}">Trades History</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"  href="{{route('graph')}}">Graph Dashboard</a>
                                    </li>
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
                        <div id="countdown2" class="timerFontSize">
                            <h4 style="color: white;">
                                <span id="hours1"></span> : <span id="minutes1"></span> : <span id="seconds1"></span>
                            </h4>
                        </div>
                        <p>Until Trading Closes</p>
                    </div>
                </div>
            </section>
        </section>

        <section class="trade-card-wrapper">
            <div class="trade-card-content-wrapper">
                <div class="trade-card-content w-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="trader-card">
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 order-1 order-sm-1 order-md-1 order-lg-0">
                                            <div class="trade-result">
                                                <h2>Crude Oil WTI <span class="lose">(-10.99)</span></h2>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-0 mb-sm-0 mb-md-0 mb-lg-4 order-0 order-sm-0 order-md-0 order-lg-1">
                                            <div class="trade-amount ">
                                                <h4><sup>$</sup>99.9</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 order-2 order-sm-2 order-md-2 order-lg-2">
                                            <div class="trader-btn-no-graph">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div>
                                                            <a href="#" class="btn-tradeer btn-buy text-center"><img src="{{asset('assets/imgs/up-arrow.png')}}" class="me-3">Buy</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div>
                                                            <a href="#" class="btn-tradeer btn-sell text-center"><img src="{{asset('assets/imgs/down-arrow.png')}}" class="me-3">Sell</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
        </section>
    </main>

    <style type="text/css">
        .with-out-graph .app-header-wrapper{
            flex: 0 0 125px ;
        }
        .trade-card-wrapper{
            flex-grow: 1;
        }
        .trade-card-content-wrapper{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }
        .trader-card{
            background: #1B1B1B;
            padding: 10px;
            width: 100%;
            border-bottom: 3px solid #B09020;
        }
        .trade-result{
            padding: 5px;
        }
        .trade-result h2 span.lose{
            font-family: 'Inter', sans-serif;
            font-weight: 300;
            color: red;
            margin: 0px;
            font-size: 14px;
        }
        .trade-result h2 span.profit{
             font-family: 'Inter', sans-serif;
            font-weight: 300;
            color: green;
            margin: 0px;
            font-size: 14px;
        }
        .trade-amount h4{
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            text-align: right;
            padding: 5px;
             font-size: 30px;
             margin-bottom: 0px;
        }
        .trade-amount h4 sup{
            color: green;
        }
        .trade-result h2{
            color: #fff;
            font-size: 30px;
            font-weight: 200;
            margin-bottom: 0px;
            font-family: 'Inter', sans-serif;
        }
        .trader-btn-no-graph{
            padding: 5px;
        }
        @media(min-width:320px) and (max-width:767px){
            .trade-amount h4{
                text-align: left;
            }
        }

    </style>


<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <!-- END PAGE LEVEL JS-->
    <script src="{{asset('admin-assets/js/toastr.min.js')}}" type="text/javascript"></script>
    <script>

        function successMsg(_msg) {
            window.toastr.success(_msg);
        }

        function errorMsg(_msg) {
            window.toastr.error(_msg);
        }

        function warningMsg(_msg) {
            window.toastr.warning(_msg);
        }

        @if(Session::has('success'))
        successMsg('{{Session::get("success")}}');
        @endif

        @if(Session::has('error'))
        errorMsg("{{Session::get('error')}}");
        @endif

    </script>





    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       
        const name = document.getElementById("initials");
        const words = name.textContent;
        const letters = words.split(" ");
        let initials = "";

        for (const word of letters) {
            if (word.length > 0) {
                initials += word.charAt(0);
            }
        }
        document.getElementById("initials").textContent = initials;


        const name2 = document.getElementById("initials2");
        const words2 = name2.textContent;
        const letters2 = words2.split(" ");
        let initials2 = "";

        for (const word2 of letters2) {
            if (word2.length > 0) {
                initials2 += word2.charAt(0);
            }
        }
        document.getElementById("initials2").textContent = initials2;

    </script>

<script type="text/javascript">
    // Function for Top Counter

    (function () {
        const second = 1000,
            minute = second * 60,
            hour = minute * 60;

        let today = new Date(),
            dd = String(today.getDate()).padStart(2, "0"),
            mm = String(today.getMonth() + 1).padStart(2, "0"),
            yyyy = today.getFullYear(),
            nextDay = new Date(today); // Create a new Date object for the next day
        nextDay.setDate(nextDay.getDate() + 1); // Set it to the next day

        // Set the start and end times (6 AM to 6 PM)
        let startTime = new Date(yyyy, mm - 1, dd, 6, 0, 0).getTime();
        let endTime = new Date(yyyy, mm - 1, dd, 18, 0, 0).getTime();

        // Check if the current time is past 6 PM, if so, set the start time for the next day
        if (today.getTime() >= endTime) {
            startTime = new Date(nextDay.getFullYear(), nextDay.getMonth(), nextDay.getDate(), 6, 0, 0).getTime();
            endTime = new Date(nextDay.getFullYear(), nextDay.getMonth(), nextDay.getDate(), 18, 0, 0).getTime();
        }

        const x = setInterval(function() {
            const now = new Date().getTime();

            if (now >= endTime) {
                // Time has passed 6 PM, set the start time for the next day
                startTime = new Date(nextDay.getFullYear(), nextDay.getMonth(), nextDay.getDate(), 6, 0, 0).getTime();
                endTime = new Date(nextDay.getFullYear(), nextDay.getMonth(), nextDay.getDate(), 18, 0, 0).getTime();
            }

            const distance = endTime - now;

            const hours = Math.floor(distance / hour);
            const minutes = Math.floor((distance % hour) / minute);
            const seconds = Math.floor((distance % minute) / second);

            document.getElementById("hours").innerText = hours;
            document.getElementById("minutes").innerText = minutes;
            document.getElementById("seconds").innerText = seconds;

            // Select elements by class name
            document.getElementById("hours1").innerText = hours;
            document.getElementById("minutes1").innerText = minutes;
            document.getElementById("seconds1").innerText = seconds;

            //do something later when time is reached
            if (distance <= 0) {
                // document.getElementById("headline").innerText = "It's 6 PM!";
                document.getElementById("countdown").style.display = "none";
                document.getElementById("countdown2").style.display = "none";
                //document.getElementById("content").style.display = "block";
                clearInterval(x);
            }
        }, 0);
    })();
   



</script>
</body>
</html>
