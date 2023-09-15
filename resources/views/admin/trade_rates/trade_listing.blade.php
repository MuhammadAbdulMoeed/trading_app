@extends('layouts.admin.admin_template')

@section('title')
    Trade Rates List
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('admin-assets/css/sweetalert2.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <h2>Trade Rates List</h2>
            </div>
            <div class="content-body">
            <a class="btn btn-info" href="{{url('/update_rates')}}" >Update Trade Rates</a>
                {{--<a class="btn btn-info" href="#" >Start Trade</a>
                <a class="btn btn-info" href="#" >Close Trade </a>--}}
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card mb-30">
                        <div class=" card-body table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Currency</th>
                                    <th scope="col">Open Rate</th>
                                    <th scope="col">High Rate</th>
                                    <th scope="col">Low Rate</th>
                                    <th scope="col">Close Rate</th>
                                    <th scope="col">DateTime</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php  $i = 1; @endphp
                                    @if(isset($rateData))
                                        @foreach($rateData as $data)
                                            <tr>
                                                <th scope="row">{{$i}}</th>
                                                <td>{{$data->base_currency}}</td>
                                                <td>{{$data->open}}</br>{{$data->open_rate}} </td>
                                                <td>{{$data->high}}</br>{{$data->high_rate}}</td>
                                                <td>{{$data->low}}</br>{{$data->low_rate}}</td>
                                                <td>{{$data->close}}</br>{{$data->close_rate}}</td>
                                                <td>{{$data->created_at}}</td>
                                            </tr>
                                        @php  $i++; @endphp
                                            @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-grow-1"></div>
        </div>
    </div>
</div>
@endsection('content')

@section('script')

    <script src="{{asset('admin-assets/js/sweetalert2.all.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.2/datatables.min.js"></script>
    <script>

    $(document).ready( function () {
        $('#myTable').DataTable();
    });

    <!-- End custom js for this page -->

    /*
        $(document).ready(function () {
            $(document).on('click','.deleteButton',function (e){
                e.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent('.deleteForm').submit();
                    }
                })


            });
        });
    */

    $("#alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#alert").slideUp(500);
    });

    </script>
@endsection('js')
