@extends('layouts.admin.admin_template')

@section('title')
    Edit Customer
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                    {{--<div class="content-header row">
                        <h2> Users Edit</h2>
                    </div>--}}

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card mb-30">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h3>Users Edit</h3>

                                    <div class="d-flex">
                                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;<a href="{{url('/dashboard')}}">Dashboard&nbsp;</a>/&nbsp;</p>
                                        <p class="text-primary mb-0 hover-cursor">Users Edit</p>
                                    </div>
                                </div>
                                <div class=" card-body">
                                    @isset($user->profileImage)
                                        <div class=" card-title">
                                            <img src="{{$user->profileImage}}" height="100" width="150">
                                        </div>
                                    @endisset
                                    <form method="post" action="{{route('users.update',[$user->id])}}" >
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"> Name</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="name" id="inputName" class="form-control" value="{{$user->name ?? ""}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Gender</label>
                                            <div class="col-sm-6">
                                                <select id="inputBlocked" name="gender" class="form-control">
                                                    <option selected>Choose Gender</option>
                                                    <option @if($user->gender == "male") selected @endif value="male">Male </option>
                                                    <option @if($user->gender == "female") selected @endif value="true"> Female </option>
                                                </select>
                                            <!--<input type="text" name="gender" class="form-control" id="inputGender" value="{{$user->gender}}">-->
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="inputState">Status</label>
                                            <div class="col-sm-6">
                                                <select id="inputBlocked" name="blocked" class="form-control">
                                                    <option selected>Choose Status</option>
                                                    <option @if($user->blocked == "false" || $user->blocked == 0) selected @endif value="false">Activated </option>
                                                    <option @if($user->blocked == "true" || $user->blocked == 1) selected @endif value="true"> Disabled </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="inputState"></label>
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection('content')

    <script>
        /*
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
        */
    </script>
