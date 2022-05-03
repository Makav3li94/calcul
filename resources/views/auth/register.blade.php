@extends('auth.auth_layout')

@section('content')

<section id="regestration">
    <div class="container-fluid">
        <div class="row full-height-vh">
            <div class="col-12 d-flex align-items-center justify-content-center gradient-aqua-marine">
                <div class="card px-4 py-2 box-shadow-2">
                    <div class="card-header text-center">
                        <img src="{{asset('front/images/logo.png')}}" alt="company-logo" class="mb-3" width="80">
                        <h4 class="text-uppercase text-bold-400 grey darken-1">ورود / ثبت نام</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-block mx-auto">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="mobile">شماره موبایل خود را وارد کنید</label>
                                        <input type="text" class="form-control form-control-lg" name="mobile" id="mobile" placeholder="*********09">
                                    </div>
                                    @if($errors->has('mobile'))
                                        <small class="text-danger d-inline-block w-100  mt-2">
                                            {{$errors->first('mobile')}}
                                        </small>
                                    @endif
                                </div>
                                <input type="hidden" name="confirm" value="on">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-danger px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0">ادامه</button>
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
