@extends('layouts.admin.admin_template')

@section('title')
    All Customers
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('admin-assets/css/sweetalert2.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <h2>Customers List</h2>
            </div>
            <div class="content-body">

            {{--<div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="d-flex align-items-end flex-wrap">
                            <div class="me-md-3 me-xl-5">
                                <h2>Customers List</h2>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-end flex-wrap">
                            <div class="d-flex">
                                <i class="mdi mdi-home text-muted hover-cursor"></i>
                                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;<a href="{{url('/dashboard')}}">Dashboard&nbsp;</a>/&nbsp;</p>
                                <p class="text-primary mb-0 hover-cursor">Customers List</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card mb-30">
                        {{--<div class="card-header d-flex justify-content-between align-items-center">
                            <h3>Customers List</h3>
                        </div>--}}
                        <div class=" card-body table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    {{--<th scope="col">Mobile No</th>
                                    <th scope="col">Gender</th>--}}
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php  $i = 1; @endphp
                                    @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><span style="color:green;">Active </span> </td>
                                        <td>
                                            <div class="table-action-wrapper">
                                                <div class="table-action-inner">
                                                    <a href="{{ url('/users/') }}/{{$user->id}}/edit" class="btn btn-info text-white btn-sm "><i class="mdi mdi-lead-pencil"></i> Edit</a>
                                                </div>
                                                <div class="table-action-inner">
                                                    <form class="deleteForm" action="{{ route('users.destroy', $user->id)}}" method="post">
                                                        {{ csrf_field() }}
                                                        @method('DELETE')
                                                        <button class="btn btn-danger deleteButton text-white btn-sm"
                                                                type="submit">
                                                            <i class="mdi mdi-delete-forever"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @php  $i++; @endphp
                                    @endforeach
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
        } );

        <!-- End custom js for this page -->

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

        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
    </script>
@endsection('js')
