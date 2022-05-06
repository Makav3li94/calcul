@extends('admin.admin_layout',['title' => 'سرمایه گذاری جدید'])
@section('styles')
    <link rel="stylesheet" href="{{asset('admin/vendors/persian-datepicker/persian-datepicker.min.css')}}"/>
@endsection
@section('content')
    <form class="form" method="post" action="{{route('user.invest.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title" id="basic-layout-form">ماشین حساب مدیریت سرمایه بیتکوین</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="px-3">
                                    <div class="form-body">
                                        <div class="">
                                            <fieldset class="form-group">
                                                <label for="budget">کل سرمایه</label>
                                                <input type="text" onkeyup="budgetChange()" name="budget" id="budget"
                                                       class="form-control input-element" value="90000000">
                                                @if($errors->has('title'))
                                                    <small class="text-danger">{{$errors->first('title')}}</small>
                                                @endif
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label for="budget">قیمت خرید بیتکوین</label>
                                                <input type="text" onkeyup="purchasePriceChange()"
                                                       name="purchase_price" id="purchase-price" value="1000000000"
                                                       class="form-control input-element">
                                                @if($errors->has('title'))
                                                    <small class="text-danger">{{$errors->first('title')}}</small>
                                                @endif
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label for="budget">بازه پایین</label>
                                                <input type="text" onkeyup="lowRangeChange()" name="low_range"
                                                       id="low-range" class="form-control input-element"
                                                       value="800000000">
                                                @if($errors->has('title'))
                                                    <small class="text-danger">{{$errors->first('title')}}</small>
                                                @endif
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label for="budget">بازه بالا</label>
                                                <input type="text" onkeyup="highRangeChange()" name="high_rang"
                                                       id="high-rang"
                                                       class="form-control input-element" value="1800000000">
                                                @if($errors->has('title'))
                                                    <small class="text-danger">{{$errors->first('title')}}</small>
                                                @endif
                                            </fieldset>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @include('admin.invest.components.cards')
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 text-xl-center">
                    <div class="form-actions">
                        <button type="submit" class="btn btn-lg btn-success">
                            <i class="icon-note"></i> ذخیره
                        </button>
                    </div>
                </div>
            </div>

    </form>
@endsection
@section('scripts')
    <script src="{{asset('admin/js/cleave.min.js')}}"></script>
    @include('admin.invest.components.scripts')
    <script src="{{asset('admin/js/invest/invest.js')}}"></script>

@endsection
