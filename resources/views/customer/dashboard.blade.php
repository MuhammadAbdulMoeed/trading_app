<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
</head>
<body>

	<main class="main-content-wrapper">
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
							</div>
							<div class="header-tag-content text-center">
								<p class="mb-0">Join our trading challenge and have a chance at winning valuable prizes!</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="trading-target-wrapper">
							<div class="trading-target-content text-center">
								<h2>$ {{ round($balance,2) ?? 0}}</h2>
								<p class="mb-0">Crude Oil WTI <span class="lose">(-0.05%)</span></p>
							</div>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="trading-close-wrapper">
							<div class="trading-close-content text-center">
								<h2>01:08:55</h2>
								<p class="mb-0">Until Trading Closes</p>
							</div>
						</div>
					</div>
                    <div class="col-lg-1">
{{--						<div class="trading-close-wrapper">--}}
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{route('trade_results')}}">Trades History</a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
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
					<div class="col-4">
						<div class="star-wrapper">
							<div class="star-content text-center">
								<img src="{{asset('assets/imgs/group-stars.png')}}" class="img-fluid">
								<p class="mb-0 mt-1">8/279</p>
							</div>
						</div>
					</div>
					<div class="col-5">
						<div class="account-balacnce">
							<div class="account-balacnce-content text-center">
								<h4 class="mb-1">Balance</h4>
								<p class="mb-0">$ {{ round($balance,2) ?? 0}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="remining-time-wrapper">
				<div class="remining-time-content">
					<h4>01:08:55</h4>
					<p>Until Trading Closes</p>
				</div>
			</div>
		</section>
	</section>
	<section class="trading-graph-wrapper">
		<div class="trading-graph-layout-wrapper">
            <div class="trading-graph-inner">
                <div id="chartdiv"></div>
            </div>
            <div class="mobile-footer-wrapper  d-lg-none d-block d-md-block d-sm-block">
                <div class="mobile-footer-content-wrapper">
                    <div class="trading-rating-content text-center">
                        <h3 class="mb-1">$79.77</h3>
                        <p class="mb-0">Crude Oil WTI <span class="lose">(-0.05%)</span></p>
                    </div>
                    <div class="trading-btn-wrapper">
                        <div class="trading-btn-placeholder">
                            <ul>
                                <li class="me-2"><button class="btn-tradeer btn-buy"><img src="{{asset('assets/imgs/up-arrow.png')}}" class="me-3"> Buy</button></li>
                                <li><button class="btn-tradeer btn-sell"><img src="{{asset('assets/imgs/down-arrow.png')}}" class="me-3"> Sell</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</section>

	<div class="buy-sell-btn-wrapper d-none d-sm-none d-md-none d-lg-block">
		<div class="buy-sell-content-wrapper">
			<div class="buy-sell-running-values d-sm-block d-block d-md-block text-center  d-lg-none">
				<h2>$ 79.77</h2>
				<p>Crude Oil WTI <span class="lose">(-0.05%)</span></p>
			</div>
			<div class="buy-sell-action-btn">
				<ul>
                    @if (isset($activeTrade) && $activeTrade != null)
                        @if($activeTrade->trade_type == "Buy")
                            <li><a href="{{url('/close_trade')}}" class="buy-btn trade-btn"><img src="{{asset('assets/imgs/up-arrow.png')}}" class="me-3"> Close {{$activeTrade->trade_type ?? "Buy"}} Trade</a></li>
                        @endif

                        @if($activeTrade->trade_type == "Sell")
                            <li><a href="{{url('/close_trade')}}" class="sell-btn trade-btn"><img src="{{asset('assets/imgs/down-arrow.png')}}" class="me-3"> Close {{$activeTrade->trade_type ?? "Sell"}} Trade</a></li>
                        @endif
                    @else
                        <li><a href="{{url('/start_buy_trade')}}" class="buy-btn trade-btn me-2"><img src="{{asset('assets/imgs/up-arrow.png')}}" class="me-3"> Buy </a></li>
                        <li><a href="{{url('/start_sell_trade')}}" class="sell-btn trade-btn"><img src="{{asset('assets/imgs/down-arrow.png')}}" class="me-3"> Sell </a></li>
                     @endif
				</ul>
			</div>
		</div>
	</div>

    </main>

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
// <!-- Chart code -->
am5.ready(function() {

    var root = am5.Root.new("chartdiv");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([am5themes_Animated.new(root)]);

    function generateChartData() {
        var chartData = [];
     /*   var firstDate = new Date();
        firstDate.setDate(firstDate.getDate() - 1000);
        firstDate.setHours(0, 0, 0, 0);
        var value = 1200;*/
        // for (var i = 0; i < 5000; i++) {
        //     var newDate = new Date(firstDate);
        //     newDate.setDate(newDate.getDate() + i);
        //
        //
        //     value += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
        //     var open = value + Math.round(Math.random() * 16 - 8);
        //     var low = Math.min(value, open) - Math.round(Math.random() * 5);
        //     var high = Math.max(value, open) + Math.round(Math.random() * 5);
        //
        //
        //     console.log(newDate.getTime(),value,open,low,high);
        //     chartData.push({
        //         date: newDate.getTime(),
        //         value: value,
        //         open: open,
        //         low: low,
        //         high: high
        //     });
        // }

        @foreach($trade_rates as $key=> $trade)

              chartData.push({
                  date: {{\Carbon\Carbon::now()->addMinute($key)->timestamp}} * 1000,
                value: {{ $trade['close_rate']}},
                open: {{$trade['open_rate']}},
                low: {{$trade['low_rate']}},
                high: {{$trade['high_rate']}}
            });
        @endforeach

        return chartData;
    }

    var data = generateChartData();

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            focusable: true,
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX"
        })
    );

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(
        am5xy.DateAxis.new(root, {
            groupData: true,
            maxDeviation: 0.5,
            baseInterval: { timeUnit: "minute", count: 1 }, // Set to minute interval
            renderer: am5xy.AxisRendererX.new(root, { pan: "zoom" }),
            tooltip: am5.Tooltip.new(root, {})
        })
    );

    var yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            maxDeviation:1,
            renderer: am5xy.AxisRendererY.new(root, {pan:"zoom"})
        })
    );

    var color = root.interfaceColors.get("background");

    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(
        am5xy.CandlestickSeries.new(root, {
            fill: color,
            calculateAggregates: true,
            stroke: color,
            name: "MDXI",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            openValueYField: "open",
            lowValueYField: "low",
            highValueYField: "high",
            valueXField: "date",
            lowValueYGrouped: "low",
            highValueYGrouped: "high",
            openValueYGrouped: "open",
            valueYGrouped: "close",
            legendValueText:
                "open: {openValueY} low: {lowValueY} high: {highValueY} close: {valueY}",
            legendRangeValueText: "{valueYClose}",
            // tooltip: am5.Tooltip.new(root, {
            //     pointerOrientation: "horizontal",
            //     labelText: "open: {openValueY}\nlow: {lowValueY}\nhigh: {highValueY}\nclose: {valueY}"
            // })
        })
    );

    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    var cursor = chart.set(
        "cursor",
        am5xy.XYCursor.new(root, {
            xAxis: xAxis
        })
    );
    cursor.lineY.set("visible", false);

    // Stack axes vertically
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/#Stacked_axes
    chart.leftAxesContainer.set("layout", root.verticalLayout);

    // Add scrollbar
    // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
    // var scrollbar = am5xy.XYChartScrollbar.new(root, {
    //     orientation: "horizontal",
    //     height: 50
    // });
    // chart.set("scrollbarX", scrollbar);

    // var sbxAxis = scrollbar.chart.xAxes.push(
    //     am5xy.DateAxis.new(root, {
    //         groupData: true,
    //         groupIntervals: [{ timeUnit: "minute", count: 1 }], // Group data by 1 minute intervals
    //         baseInterval: { timeUnit: "minute", count: 1 },     // Set the base interval to 1 minute
    //         renderer: am5xy.AxisRendererX.new(root, {
    //             opposite: false,
    //             strokeOpacity: 0
    //         })
    //     })
    // );

    // var sbyAxis = scrollbar.chart.yAxes.push(
    //     am5xy.ValueAxis.new(root, {
    //         renderer: am5xy.AxisRendererY.new(root, {})
    //     })
    // );

    // var sbseries = scrollbar.chart.series.push(
    //     am5xy.LineSeries.new(root, {
    //         xAxis: sbxAxis,
    //         yAxis: sbyAxis,
    //         valueYField: "value",
    //         valueXField: "date"
    //     })
    // );

    // Add legend
    // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
    // var legend = yAxis.axisHeader.children.push(am5.Legend.new(root, {}));
    //
    // legend.data.push(series);
    //
    // legend.markers.template.setAll({
    //     width: 10
    // });
    //
    // legend.markerRectangles.template.setAll({
    //     cornerRadiusTR: 0,
    //     cornerRadiusBR: 0,
    //     cornerRadiusTL: 0,
    //     cornerRadiusBL: 0
    // });

    // set data
    series.data.setAll(data);
    // sbseries.data.setAll(data);

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear(1000);
    chart.appear(1000, 100);
    // Fetch and update data at a specific interval (e.g., every 5 seconds)
    setInterval(generateChartData, 30000); // 5000 milliseconds = 5 seconds
});
// end am5.ready()
</script>
</body>
</html>
