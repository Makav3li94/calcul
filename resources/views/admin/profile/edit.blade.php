@extends('admin.admin_layout')

@section('content')
    <form class="form" method="post" action="" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title" id="basic-layout-form">ویرایش کاربر</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <div class="form-body">
                                <div class="">
                                    <div class="form-group row">
                                        <label class="col-md-4" for="name"> نام و نام خانوادگی </label>
                                        <div class=" col-md-8">
                                            <input type="text" id="name" class="form-control" name="name" value="{{$user->name}}">
                                        </div>
                                        @if($errors->has('name'))
                                            <small class="text-danger">{{$errors->first('name')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4" for="email"> ایمیل </label>
                                        <div class=" col-md-8">
                                            <input type="text" id="email" class="form-control" name="email" value="{{$user->email}}">
                                        </div>
                                        @if($errors->has('email'))
                                            <small class="text-danger">{{$errors->first('email')}}</small>
                                        @endif
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4" for="mobile"> شماره همراه </label>
                                        <div class=" col-md-8">
                                            <input type="text" id="mobile" class="form-control" name="mobile" value="{{$user->mobile}}" readonly="">
                                        </div>
                                        @if($errors->has('mobile'))
                                            <small class="text-danger">{{$errors->first('mobile')}}</small>
                                        @endif
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-md-12 text-xl-center">
                    <div class="form-actions">
                        <button type="submit" class="btn btn-lg btn-success">
                            <i class="icon-note"></i> ذخیره
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title" id="basic-layout-form">ویرایش رمز عبور</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <div class="form-body">
                                <div class="">
                                    <div class="form-group row">
                                        <label class="col-md-4" for="password"> رمز عبور جدید </label>
                                        <div class=" col-md-8">
                                            <input type="text" id="password" class="form-control" name="password" value="">
                                        </div>
                                        @if($errors->has('password'))
                                            <small class="text-danger">{{$errors->first('password')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4" for="password_confirm"> تایید رمز عبور </label>
                                        <div class=" col-md-8">
                                            <input type="text" id="password_confirm" class="form-control" name="password_confirm" value="">
                                        </div>
                                        @if($errors->has('password_confirm'))
                                            <small class="text-danger">{{$errors->first('password_confirm')}}</small>
                                        @endif
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-md-12 text-xl-center">
                    <div class="form-actions">
                        <button type="submit" class="btn btn-lg btn-success">
                            <i class="icon-note"></i> ذخیره
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
