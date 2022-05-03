@include('admin.inc.head')
<div class="wrapper">
    @include('admin.inc.siderbar')
    @include('admin.inc.header')
    <div class="main-panel {{auth()->check() ? '': 'mt-0'}}">
        <div class="main-content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="content-header">{{isset($title) ? $title : 'کلکول'}}</h2>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

{{--@include('admin.inc.notification-siderbar')--}}
{{--@include('admin.inc.setting-siderbar')--}}
@include('admin.inc.footer')

@if(session()->has('success'))
    <script>
        toastr.success("عملیات با موفقیت انجام شد")
    </script>
@elseif(session()->has('error'))
    <script>
        toastr.error("خطا! عملیات نا موفق")
    </script>
@endif
