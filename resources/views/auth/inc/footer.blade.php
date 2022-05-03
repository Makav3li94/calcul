</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN VENDOR JS-->
<script src="{{asset('admin/vendors/js/core/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('admin/vendors/js/core/popper.min.js')}}"></script>
<script src="{{asset('admin/vendors/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/vendors/js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('admin/vendors/js/prism.min.js')}}"></script>
<script src="{{asset('admin/vendors/js/jquery.matchHeight-min.js')}}"></script>
<script src="{{asset('admin/vendors/js/screenfull.min.js')}}"></script>
<script src="{{asset('admin/vendors/js/sweetalert2.min.js')}}"></script>

<script src="{{asset('admin/vendors/js/pace/pace.min.js')}}"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN CONVEX JS-->
@yield('scripts')
<script>
    @if(session()->has('newPassSent'))
    swal("رمز عبور جدید با موفقیت ارسال شد.").done();
    @endif
    @if(session()->has('numberNotFound'))
    swal("همچین شماره ای در سیستم وجود ندارد.").done();
    @endif
</script>
<script src="{{asset('admin/js/app-sidebar.js')}}"></script>
<script src="{{asset('admin/js/notification-sidebar.js')}}"></script>
<!-- END CONVEX JS-->
<!-- END CONVEX JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
</body>

<!-- Mirrored from pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/demo-2/register-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Sep 2018 15:06:34 GMT -->
</html>