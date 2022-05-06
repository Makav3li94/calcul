@extends('admin.admin_layout',['title' => 'مشاهده سرمایه گذاری'])

@section('content')
    <form class="form" method="post" action="{{route('user.invest.update',$invest->id)}}" enctype="multipart/form-data">
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
                                                       readonly
                                                       class="form-control input-element" value="{{$invest->budget}}">
                                                @if($errors->has('title'))
                                                    <small class="text-danger">{{$errors->first('title')}}</small>
                                                @endif
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label for="budget">قیمت خرید بیتکوین</label>
                                                <input type="text" onkeyup="purchasePriceChange()"
                                                       name="purchase_price" id="purchase-price" readonly
                                                       value="{{$invest->purchase_price}}"
                                                       class="form-control input-element">
                                                @if($errors->has('title'))
                                                    <small class="text-danger">{{$errors->first('title')}}</small>
                                                @endif
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label for="budget">بازه پایین</label>
                                                <input type="text" onkeyup="lowRangeChange()" name="low_range" readonly
                                                       id="low-range" class="form-control input-element"
                                                       value="{{$invest->low_range}}">
                                                @if($errors->has('title'))
                                                    <small class="text-danger">{{$errors->first('title')}}</small>
                                                @endif
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label for="budget">بازه بالا</label>
                                                <input type="text" onkeyup="highRangeChange()" name="high_rang" readonly
                                                       id="high-rang"
                                                       class="form-control input-element"
                                                       value="{{$invest->high_rang}}">
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
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-warning">
                            <h4 class="card-title">سابقه سرمایه گذاری</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">

                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                    <tr>
                                        <th class="border-top-0">ردیف</th>
                                        <th class="border-top-0">قیمت ارز</th>
                                        <th class="border-top-0">سرمایه لحظه ای</th>
                                        <th class="border-top-0">مقدار خرید یا فروش</th>
                                        <th class="border-top-0">مقدار سرمایه گذاری پیشنهادی</th>
                                        <th class="border-top-0">مقدار ذخیره تومانی</th>
                                        <th class="border-top-0">تاریخ</th>
                                        <th class="border-top-0">بالانس سرمایه</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($invest->metas as $key=> $meta)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{number_format($meta->btc_price_input)}}</td>
                                            <td>{{number_format($meta->instant_capital)}}</td>
                                            <td>{{number_format($meta->profit_loss)}}</td>
                                            <td>{{number_format($meta->buy_offer)}}</td>
                                            <td>{{number_format($meta->toman_savings)}}</td>
                                            <td>{{Verta::instance($meta->created_at)->formatDifference()}}</td>
                                            <td>{{number_format(($meta->buy_offer +  $meta->toman_savings) - $invest->budget)}}</td>
                                        </tr>
                                    @empty
                                        سابقه ای موجود نیست.
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>

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
