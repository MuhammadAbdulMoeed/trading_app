<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
{{--	@include('layouts.admin.head')--}}
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    {{--    <title>Trading App DashBoard</title>--}}
    @yield('title')
    <link rel="apple-touch-icon" href="{{asset('admin-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700" rel="stylesheet">
@include('layouts.admin.css')

@yield('style')
<!-- END Custom CSS-->
</head>
  <body class="vertical-layout vertical-compact-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="2-columns">

	@include('layouts.admin.header')


    @include('layouts.admin.menu')

    @yield('content')
    <!-- ////////////////////////////////////////////////////////////////////////////-->
	@include('layouts.admin.footer')
    @include('layouts.admin.js')
    @yield('script')
  </body>
</html>
