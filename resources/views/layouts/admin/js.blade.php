<!-- BEGIN VENDOR JS-->
<script src="{{asset('admin-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('admin-assets/vendors/js/charts/chartist.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-assets/vendors/js/charts/chartist-plugin-tooltip.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-assets/vendors/js/timeline/horizontal-timeline.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('admin-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-assets/js/core/app.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('admin-assets/js/scripts/pages/dashboard-ico.js')}}" type="text/javascript"></script>
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
