@extends('auth.auth_layout')

@section('content')
    <section id="forgot-password">
        <div class="container-fluid">
            <div class="row full-height-vh">
                <div class="col-12 d-flex align-items-center justify-content-center gradient-aqua-marine">
                    <div class="card px-4 py-2 box-shadow-2">
                        <div class="card-header text-center">
                            <img src="{{asset('admin/img/logos/logo-color-big.png')}}" alt="company-logo" class="mb-3" width="80">
                            <h4 class="text-uppercase text-bold-400 grey darken-1">رمز عبور را فراموش کرده اید</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                <form class="pt-2" action="{{route('forget_password')}}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <label for="mobile">شماره موبایل خود را وارد کنید</label>
                                        <input type="text" class="form-control form-control-lg" name="mobile" id="mobile" placeholder="**********09">
                                    </div>
                                    <div class="form-group pt-2">
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-danger px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0">ارسال</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer grey darken-1">
                                <div class="float-left"><a href="{{route('login')}}">ورود</a></div>
                                <div class="float-right">کاربر جدید؟<a href="{{route('register')}}">ثبت نام کنید</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
