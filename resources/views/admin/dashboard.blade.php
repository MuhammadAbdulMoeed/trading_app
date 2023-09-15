@extends('layouts.admin.admin_template')

@section('title')
    <title>Customer Dashboard</title>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

@endsection
@section('content')

<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Dashboard</h3>
                {{--<div class="row breadcrumbs-top d-inline-block">
                </div>--}}
                <div class="content-body">
                    <!-- Trades Chart-->
                    <div class="row match-height">
                        <div class="col-xl-12 col-12">
                            <div class="card card-transparent">
                                <div class="card-header card-header-transparent py-20">
                                    <div class="btn-group dropdown">
                                        <h6>Trades Time Series Data</h6>
                                    </div>
                                </div>
                                <div id="chart" class="height-300"></div>
                            </div>
                        </div>
                    </div>

    {{--
                    <div class="row match-height">
                        <div class="col-xl-8 col-12">
                            <div class="card card-transparent">
                                <div class="card-header card-header-transparent py-20">
                                    <div class="btn-group dropdown">
                                        <h6>Trades Time Series Data</h6>
                                    </div>
                                </div>
                                <div id="ico-token-supply-demand-chart" class="height-300"></div>

                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12">
                            <div class="card card-transparent">
                                <div class="card-header card-header-transparent">
                                    <h6 class="card-title">Token distribution</h6>
                                </div>
                                <div class="card-content">
                                    <div id="token-distribution-chart" class="height-200 donut donutShadow"></div>
                                    <div class="card-body">
                                        <div class="row mx-0">
                                            <ul class="token-distribution-list col-md-6 mb-0">
                                                <li class="crowd-sale">Crowd sale <span class="float-right text-muted">41%</span></li>
                                                <li class="team">Team <span class="float-right text-muted">18%</span></li>
                                                <li class="advisors">Advisors <span class="float-right text-muted">15%</span></li>
                                            </ul>
                                            <ul class="token-distribution-list col-md-6 mb-0">
                                                <li class="project-reserve">Project <span class="float-right text-muted">10%</span></li>
                                                <li class="master-nodes">Master nodes <span class="float-right text-muted">8%</span></li>
                                                <li class="program">Program <span class="float-right text-muted">8%</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    --}}
                <!--/ ICO Token &  Distribution-->

                    <!-- Recent Transactions -->
                    <div class="row">
                        <div id="recent-transactions" class="col-12">
                            <h6 class="my-2">Recent Trades</h6>
                            <div class="card">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0">Date</th>
                                                    <th class="border-top-0">Type</th>
                                                    <th class="border-top-0">Amount</th>
                                                    <th class="border-top-0">Currency</th>
                                                    <th class="border-top-0">Details</th>
            {{--                                        <th class="border-top-0">Tokens (CIC)</th>--}}
                                                    {{--<th class="border-top-0"></th>--}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                                                    <td class="text-truncate"><a href="#">2018-01-03</a></td>
                                                    <td class="text-truncate">
                                                        <a href="#" class="mb-0 btn-sm btn btn-outline-success round">Deposit</a>
                                                    </td>
                                                    <td class="text-truncate p-1">$ 5341</td>
                                                    <td>
            {{--											<i class="cc ETH-alt"></i> --}} USD
                                                    </td>
                                                    <td class="text-truncate">Deposit to your Balance</td>

                                                </tr>
                                                <tr>
                                                    <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                                                    <td class="text-truncate"><a href="#">2018-01-03</a></td>
                                                    <td class="text-truncate">
                                                        <a href="#" class="mb-0 btn-sm btn btn-outline-success round">Deposit</a>
                                                    </td>
                                                    <td class="text-truncate p-1">$ 5341</td>
                                                    <td>
            {{--											<i class="cc ETH-alt"></i> --}} USD
                                                    </td>
                                                    <td class="text-truncate">Deposit Balance</td>
                                                    {{--<td>3,258</td>
                                                    <td class="text-truncate">Tokens Purchase</td>
                                                    <td></td>--}}
                                                </tr>
                                                <tr>
                                                    <td class="text-truncate"><i class="la la-dot-circle-o danger font-medium-1 mr-1"></i> Pending</td>
                                                    <td class="text-truncate"><a href="#">2018-01-25</a></td>
                                                    <td class="text-truncate">
                                                        <a href="#" class="mb-0 btn-sm btn btn-outline-danger round">Withdrawal</a>
                                                    </td>
                                                    <td class="text-truncate p-1">$3,458</td>
                                                    <td>USD</td>
                                                    <td class="text-truncate"> withdrawn</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-truncate"><i class="la la-dot-circle-o danger font-medium-1 mr-1"></i> Pending</td>
                                                    <td class="text-truncate"><a href="#">2018-01-28</a></td>
                                                    <td class="text-truncate">
                                                        <a href="#" class="mb-0 btn-sm btn btn-outline-danger round">Deposit</a>
                                                    </td>
                                                    <td class="text-truncate p-1">$ 8791</td>
                                                    <td>{{--<i class="cc BTC-alt"></i>--}} USD</td>
                                                    <td class="text-truncate">Deposit to your Balance</td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Recent Transactions -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="text/javascript">
        const dates = [
            {
                x: new Date("2023-01-01T00:00:00Z").getTime(),
                y: 30
            },
            {
                x: new Date("2023-01-02T00:00:00Z").getTime(),
                y: 40
            },
            // Add more data points...
        ];

        var options = {
            series: [{
                name: 'XYZ TRADES',
                data: dates
            }],
            chart: {
                type: 'area',
                stacked: false,
                height: 350,
                zoom: {
                    type: 'x',
                    enabled: true,
                    autoScaleYaxis: true
                },
                toolbar: {
                    autoSelected: 'zoom'
                }
            },
            dataLabels: {
                enabled: false
            },
            markers: {
                size: 0,
            },
            title: {
                text: 'Stock Price Movement',
                align: 'left'
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    inverseColors: false,
                    opacityFrom: 0.5,
                    opacityTo: 0,
                    stops: [0, 90, 100]
                },
            },
            yaxis: {
                labels: {
                    formatter: function (val) {
                        return (val / 1000000).toFixed(0);
                    },
                },
                title: {
                    text: 'Price'
                },
            },
            xaxis: {
                type: 'datetime',
            },
            tooltip: {
                shared: false,
                y: {
                    formatter: function (val) {
                        return (val / 1000000).toFixed(0)
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

    /*const timeSeriesData = [
        {
            x: new Date("2023-01-01T00:00:00Z").getTime(),
            y: 30
        },
        {
            x: new Date("2023-01-02T00:00:00Z").getTime(),
            y: 40
        },
    // Add more data points...
    ];

    const chartOptions = {
        chart: {
            type: 'line',
            zoom: {
                enabled: true,
            },
        },
        xaxis: {
            type: 'datetime',
        },
    };

    const chartData = [{
        name: 'Time Series Data',
        data: timeSeriesData,
    }];

    const chart = new ApexCharts(document.querySelector("#chart"), chartOptions);

    chart.render();*/

    </script>

@endsection
