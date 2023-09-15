@extends('layouts.admin.admin_template')
@section('title')
   <title>Wallet</title>
@endsection

@section('style')
   <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/pages/wallet.css')}}">
 @endsection

@section('content')
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Wallet</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Wallet
                  </li>
                </ol>
              </div>
            </div>
          </div>
          {{--<div class="content-header-right col-md-4 col-12 d-none d-md-inline-block">
            <div class="btn-group float-md-right"><a class="btn-gradient-secondary btn-sm white" href="{{route('wallet')}}">Buy now</a></div>
          </div>--}}
        </div>
        <div class="content-detached content-left">
          <div class="content-body">
              <div id="wallet">
                <div class="wallet-table-th d-none d-md-block">
                    <div class="row">
                        <div class="col-md-6 col-12 py-1">
                            <p class="mt-0 text-capitalize">Currency</p>
                        </div>
                        <div class="col-md-2 col-12 py-1 text-center">
                            <p class="mt-0 text-capitalize">Available Balance</p>
                        </div>
                        <div class="col-md-4 col-12 py-1 text-center">
                            <p class="mt-0 text-capitalize">Transect</p>
                        </div>
                    </div>
                </div>
    <!-- BTC
    <section class="card pull-up">
        <div class="card-content">
            <div class="card-body">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 col-12 py-1">
                            <div class="media">
                                <i class="cc BTC mr-2 font-large-2 warning"></i>
                                <div class="media-body">
                                    <h5 class="mt-0 text-capitalize">Bitcoin</h5>
                                    <p class="text-muted mb-0 font-small-3 wallet-address">0xe834a970619218d0a7db4ee5a3c87022e71e177f</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-12 py-1 text-center">
                            <h6>0.019842 BTC</h6>
                            <p class="text-muted mb-0 font-small-3">~ $2650.78</p>
                        </div>
                        <div class="col-md-2 col-12 py-1 text-center">
                            <a href="#" class="line-height-3">Deposit</a>
                        </div>
                        <div class="col-md-2 col-12 py-1 text-center">
                            <a href="#" class="line-height-3">Withdraw</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     BTC -->

    <!-- USD, EUR, other fiat currencies -->
    <section class="card pull-up">
        <div class="card-content">
            <div class="card-body">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 col-12 py-1">
                            <div class="media">
                                <i class="la la-dollar mr-2 bg-primary white bg-lighten-2 rounded-circle"></i>
                                <div class="media-body">
                                    <h5 class="mt-0 text-capitalize">USD</h5>
                                    <p class="text-muted mb-0 font-small-3 wallet-address">Fiat currencies</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-12 py-1 text-center">
                            <h6> USD</h6>
                            <p class="text-muted mb-0 font-small-3">~ ${{$balance ?? 0}}</p>
                        </div>
                        <div class="col-md-2 col-12 py-1 text-center">
                            <a href="#" class="line-height-3">Deposit</a>
                        </div>
                        <div class="col-md-2 col-12 py-1 text-center">
                            <a href="#" class="line-height-3">Withdraw</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ USD, EUR, other fiat currencies -->
</div>
          </div>
        </div>
        <div class="sidebar-detached sidebar-right" ="">
          <div class="sidebar">

		  <div id="wallet-sidebar" class="sidebar-content">
			<div class="row">
				<p class="py-1 text-capitalize col-12">Your balance</p>
			</div>
				<div class="card">
					<div class="card-header">
						<h6 class="card-title text-center">USD</h6>
					</div>
					<div class="card-content collapse show">
						<div class="card-body">
							<div class="text-center row clearfix mb-2">
								<div class="col-12">
									<i class="icon-layers font-large-3 bg-warning bg-glow white rounded-circle p-3 d-inline-block"></i>
								</div>
							</div>
							<h3 class="text-center">$ {{$balance ?? 0}}</h3>
						</div>
						<!--
						<div class="table-responsive">
							  <table class="table table-de mb-0">
								<tbody>
								  <tr>
									<td>CIC Token</td>
									<td><i class="icon-layers"></i> 3,258 CIC</td>
								  </tr>
								  <tr>
									<td>CIC Referral</td>
									<td><i class="icon-layers"></i> 200.88 CIC</td>
								  </tr>
								  <tr>
									<td>CIC Price</td>
									<td><i class="cc BTC-alt"></i> 0.0001 BTC</td>
								  </tr>
								  <tr>
									<td>Raised BTC</td>
									<td><i class="cc BTC-alt"></i> 2154 BTC</td>
								  </tr>
								  <tr>
									<td>Raised USD</td>
									<td><i class="la la-dollar"></i> 4.52 M</td>
								  </tr>
								</tbody>
							  </table>
							</div>
							-->
						</div>
				</div>
			</div>
          </div>
        </div>
      </div>
    </div>
   @endsection


   @section('script')

   @endsection
