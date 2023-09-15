@extends('layouts.admin.admin_template')
@section('title')
   <title>Trades</title>
@endsection

@section('style')
   <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/pages/transactions.css')}}">
 @endsection

@section('content')
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Trades</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Trades
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right col-md-4 col-12 d-none d-md-inline-block">
            <div class="btn-group float-md-right"><a class="btn-gradient-secondary btn-sm white" href="{{route('wallet')}}">Buy now</a></div>
          </div>
        </div>
        <div class="content-body">
			<div id="transactions">
				<div class="transactions-table-th d-none d-md-block">
					<div class="col-12">
						<div class="row px-1">
							<div class="col-md-2 col-12 py-1">
								<p class="mb-0">Date</p>
							</div>
							<div class="col-md-2 col-12 py-1">
								<p class="mb-0">Type</p>
							</div>
							<div class="col-md-2 col-12 py-1">
								<p class="mb-0">Amount</p>
							</div>
							<div class="col-md-1 col-12 py-1">
								<p class="mb-0">Currency</p>
							</div>
							{{--<div class="col-md-2 col-12 py-1">
								<p class="mb-0">Tokens (CIC)</p>
							</div>--}}
							<div class="col-md-3 col-12 py-1">
								<p class="mb-0">Details</p>
							</div>
						</div>
					</div>
				</div>
			<div class="transactions-table-tbody">
				<section class="card pull-up">
					<div class="card-content">
						<div class="card-body">
							<div class="col-12">
								<div class="row">
									<div class="col-md-2 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Date: </span>2018-01-03</p>
									</div>
									<div class="col-md-2 col-12 py-1">
										<span class="d-inline-block d-md-none text-bold-700">Type: </span> <span class="d-inline-block d-md-none text-bold-700">Type: </span>  <a href="#" class="mb-0 btn-sm btn btn-outline-warning round">Deposit</a>
									</div>
									<div class="col-md-2 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Amount: </span> $ 5341 </p>
									</div>
									<div class="col-md-1 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Currency: </span>  USD</p>
									</div>
									{{--<div class="col-md-2 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Tokens: </span> - </p>
									</div>--}}
									<div class="col-md-3 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Details: </span> Deposit to your Balance <i class="la la-thumbs-up warning float-right"></i></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="card pull-up">
					<div class="card-content">
						<div class="card-body">
							<div class="col-12">
								<div class="row">
									<div class="col-md-2 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Date:</span> 2018-01-03</p>
									</div>
									<div class="col-md-2 col-12 py-1">
										<span class="d-inline-block d-md-none text-bold-700">Type: </span>  <a href="#" class="mb-0 btn-sm btn btn-outline-success round">Deposit</a>
									</div>
									<div class="col-md-2 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Amount: </span> $ 5341 </p>
									</div>
									<div class="col-md-1 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Currency: </span> USD</p>
									</div>
								{{--	<div class="col-md-2 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Tokens: </span> 3,258</p>
									</div>--}}
									<div class="col-md-3 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Details: </span> Deposit to your Balance</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="card pull-up">
					<div class="card-content">
						<div class="card-body">
							<div class="col-12">
								<div class="row">
									<div class="col-md-2 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Date:</span> 2018-01-21</p>
									</div>
									<div class="col-md-2 col-12 py-1">
										<span class="d-inline-block d-md-none text-bold-700">Type: </span>  <a href="#" class="mb-0 btn-sm btn btn-outline-danger round">Withdrawal</a>
									</div>
									<div class="col-md-2 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Amount: </span> $ 3,458 </p>
									</div>
									<div class="col-md-1 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Currency: </span> USD </p>
									</div>
									{{--<div class="col-md-2 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Tokens: </span> - 3,458.88</p>
									</div>--}}
									<div class="col-md-3 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Details: </span> withdrawn <i class="la la-dollar warning float-right"></i></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				{{--<section class="card pull-up">
					<div class="card-content">
						<div class="card-body">
							<div class="col-12">
								<div class="row">
									<div class="col-md-2 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Date:</span> 2018-01-25</p>
									</div>
									<div class="col-md-2 col-12 py-1">
										<span class="d-inline-block d-md-none text-bold-700">Type: </span>  <a href="#" class="mb-0 btn-sm btn btn-outline-warning round">Deposit</a>
									</div>
									<div class="col-md-2 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Amount: </span> 0.8791 </p>
									</div>
									<div class="col-md-1 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Currency: </span> <i class="cc BTC-alt"></i> BTC</p>
									</div>
									<div class="col-md-2 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Tokens: </span>  - </p>
									</div>
									<div class="col-md-3 col-12 py-1">
										<p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Details: </span> Deposit to your Balance <i class="la la-thumbs-up warning float-right"></i></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>--}}
					<nav aria-label="Page navigation">
						<ul class="pagination justify-content-center pagination-separate pagination-flat">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">« Prev</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">4</a></li>
							<li class="page-item"><a class="page-link" href="#">5</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">Next »</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
   @endsection


   @section('script')

   @endsection
