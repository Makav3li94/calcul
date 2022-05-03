@extends('auth.auth_layout')

@section('content')
    <section id="regestration">
        <div class="container-fluid">
            <div class="row full-height-vh">
                <div class="col-12 d-flex align-items-center justify-content-center gradient-aqua-marine">
                    <div class="card px-4 py-2 box-shadow-2">
                        <div class="card-header text-center">
                            <img src="{{asset('admin/img/logos/logo-color-big.png')}}" alt="company-logo" class="mb-3" width="80">
                            <h4 class="text-uppercase text-bold-400 grey darken-1">تکمیل ثبت نام</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-block mx-auto">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-lg" name="confirm_code" value="{{old('confirm_code')}}" id="confirm_code"
                                                   placeholder="کد تایید پیامکی">
                                        </div>
                                        @if($errors->has('confirm_code'))
                                            <small class="text-danger d-inline-block w-100  mt-2">
                                                لطفا کد تاییدی که به تلفن همراهتان ارسال شد را وارد کنید.
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-lg" name="name" value="{{old('name')}}" id="name" placeholder="نام و نام خانوادگی">
                                        </div>
                                        @if($errors->has('name'))
                                            <small class="text-danger d-inline-block w-100  mt-2">
                                                لطفا نام و نام خانوادگی را وارد کنید
                                            </small>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="email" class="form-control form-control-lg" value="{{old('email')}}" name="email" id="email" placeholder="ایمیل">
                                        </div>
                                        @if($errors->has('email'))
                                            <small class="text-danger d-inline-block w-100  mt-2">
                                                لطفا ایمیل را به درستی وارد کنید
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="رمز عبور">
                                        </div>
                                        @if($errors->has('password'))
                                            <small class="text-danger d-inline-block w-100  mt-2">
                                                {{$errors->first('password')}}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-offset-1">
                                        <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                            <input type="checkbox" name="terms" class="custom-control-input" checked id="terms">
                                            <label class="custom-control-label pl-2" for="terms">با <a href="">شرایط و ضوابط</a> موافقم</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="mobile" value="{{request()->mobile}}">
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-danger px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0">ثبت نام</button>
                                        <p class="registerResend mt-5" style="text-align: center">کد نیومد؟
                                            <a style="cursor: no-drop !important;opacity: 0.5;text-align: right"
                                               id="registerResend" onclick="resend('{{request()->mobile}}')"
                                               class="off text-info m-l-5">
                                                <b>ارسال مجدد</b>
                                            </a>
                                            <span id="countDown"></span>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')


    <script src="{{asset('admin/vendors/js/countdown/jquery.countdown.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            countDown()

        });

        function countDown() {
            var oneMinute = new Date().getTime() + 59000;
            $('#countDown').fadeIn();
            $('#countDown').countdown(oneMinute)

                .on('update.countdown', function (event) {
                    $(this).html(event.strftime('در %S ثانیه دیگر'));
                })
                .on('finish.countdown', function (event) {
                    $(this).fadeOut();
                    $('#registerResend').css({
                        'cursor': 'pointer',
                        'opacity': '1'
                    }).removeClass('off').addClass('on');
                });
        }

        function resend(val) {
            if ($('#registerResend').css('cursor') == 'no-drop') {
                return false;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var mobile = val;
            $.ajax({
                'url': "{{route('resend_code')}}",
                'type': 'get',
                'contentType': "application/json",
                data: {mobile: mobile},

                success: function (response) {
                    if (response.sms_send == 'success') {
                        swal("کد تایید مجددا ارسال شد.").done();

                        $('#registerResend').css({
                            'cursor': 'no-drop',
                            'opacity': '0.5'
                        }).removeClass('on').addClass('off');
                        countDown()
                        ('#countDown').css({'display': 'block'});
                    }
                }
            });
        }
    </script>
@endsection