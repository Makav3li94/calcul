@include('super-admin.inc.head')
<div class="wrapper">
    @include('super-admin.inc.siderbar')
    @include('super-admin.inc.header')
    <div class="main-panel">
        <div class="main-content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

{{--@include('admin.inc.notification-siderbar')--}}
{{--@include('admin.inc.setting-siderbar')--}}
@include('super-admin.inc.footer')
<script>
    toastr.options = {
        "debug": false,
        "positionClass": "toast-bottom-left",
        "onclick": null,
        "fadeIn": 300,
        "fadeOut": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000
    }
</script>
@if(session()->has('success'))
    <script>
        toastr.success("عملیات با موفقیت انجام شد")
    </script>
@elseif(session()->has('error'))
    <script>
        toastr.error("خطا! عملیات نا موفق")
    </script>
@endif
