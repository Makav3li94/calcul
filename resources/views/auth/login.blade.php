@extends('auth.auth_layout')

@section('content')

    <section id="login">
        <div class="container-fluid">
            <div class="row full-height-vh">
                <div class="col-12 d-flex align-items-center justify-content-center gradient-aqua-marine">
                    <div class="card px-4 py-2 box-shadow-2 width-400">
                        <div class="card-header text-center">
                            <img src="{{asset('admin/img/logo-galaxy.png')}}" alt="company-logo" class="mb-3" width="80">
                            <h4 class="text-uppercase text-bold-400 grey darken-1">ورود</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    @if(isset(request()->mobile))
                                        <input type="hidden" name="mobile" value="{{request()->mobile}}">
                                    @else
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="mobile">ایمیل خود را وارد کنید</label>
                                                <input type="text" class="form-control form-control-lg" name="email" id="email" placeholder="test@gmail.com" required
                                                       value="{{old('email')}}">
                                            </div>
                                            @if($errors->has('mobile'))
                                                <small class="text-danger d-inline-block w-100  mt-2">
                                                    {{$errors->first('email')}}
                                                </small>
                                            @endif
                                        </div>
                                    @endif


                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="mobile">رمز عبور</label>
                                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="رمز عبور" required>
                                        </div>
                                        @if($errors->has('password'))
                                            <small class="text-danger d-inline-block w-100  mt-2">
                                                {{$errors->first('password')}}
                                            </small>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0 ml-5">
                                                    <input type="checkbox" name="remember" class="custom-control-input" checked id="remember">
                                                    <label class="custom-control-label" for="remember">مرا به خاطر بسپار</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="text-center col-md-12">
                                            <button type="submit" class="btn btn-danger px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0">ارسال</button>
                                        </div>
                                    </div>

{{--                                    <a href="{{ url('auth/google') }}">--}}

{{--                                        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">--}}

{{--                                    </a>--}}
                                </form>
                            </div>
                        </div>
                        <div class="card-footer grey darken-1">
                            <div class="text-center mb-1">رمز عبور را فراموش کرده اید؟ <a href="{{url('password/reset')}}"><b>بازیابی</b></a></div>
                            <div class="text-center">آیا حساب کاربری ندارید؟ <a href="{{route('register')}}"><b>ثبت نام</b></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
