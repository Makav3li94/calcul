@extends('admin.admin_layout',['title' => 'سرمایه گذاری جدید'])
@section('styles')
    <link rel="stylesheet" href="{{asset('admin/vendors/persian-datepicker/persian-datepicker.min.css')}}"/>
@endsection
@section('content')
    <form class="form" method="post" action="" enctype="multipart/form-data">
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
                            <div class="col-lg-6">
                                <div class="px-3">
                                    <div class="form-body">
                                        <div class="">
                                            <fieldset class="form-group">
                                                <label for="budget">کل سرمایه</label>
                                                <input type="text" name="budget" id="budget" class="form-control input-element" value="90000000">
                                                @if($errors->has('title'))
                                                    <small class="text-danger">{{$errors->first('title')}}</small>
                                                @endif
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label for="budget">قیمت خرید بیتکوین</label>
                                                <input type="text" name="purchase-price" id="purchase-price " value="1000000000"
                                                       class="form-control input-element">
                                                @if($errors->has('title'))
                                                    <small class="text-danger">{{$errors->first('title')}}</small>
                                                @endif
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label for="budget">بازه پایین</label>
                                                <input type="text" name="low-range" id="low-range" class="form-control input-element"
                                                       value="800000000">
                                                @if($errors->has('title'))
                                                    <small class="text-danger">{{$errors->first('title')}}</small>
                                                @endif
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label for="budget">بازه بالا</label>
                                                <input type="text" name="high-rang" id="high-rang"
                                                       class="form-control input-element" value="1800000000">
                                                @if($errors->has('title'))
                                                    <small class="text-danger">{{$errors->first('title')}}</small>
                                                @endif
                                            </fieldset>


                                            {{--                                    <div class="form-group row">--}}
                                            {{--                                        <label for="start_at" class="col-md-4"> تاریخ انتشار </label>--}}
                                            {{--                                        <div class="col-md-8">--}}
                                            {{--                                            <input type="text" id="publish_at" class="form-control datepicker-started-at" name="start_at" value="{{old('publish_at') ?? ''}}"--}}
                                            {{--                                                   readonly>--}}
                                            {{--                                        </div>--}}
                                            {{--                                        @if($errors->has('publish_at'))--}}
                                            {{--                                            <small class="text-danger">{{$errors->first('publish_at')}}</small>--}}
                                            {{--                                        @endif--}}
                                            {{--                                    </div>--}}


                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class=" col-lg-8 ">
                                        <div class="card bg-warning">
                                            <div class="card-body">
                                                <div class="px-3 py-3">
                                                    <div class="row text-white">
                                                        <div class="col-3">
                                                            <h1>
                                                                <i class="fa fa-btc background-round text-white p-2 font-medium-3"></i>
                                                            </h1>
                                                            <h4 class="pt-1 m-0 text-white">45% <i
                                                                    class="fa fa-long-arrow-up"></i></h4>
                                                        </div>
                                                        <div class="col-9 text-right pr-0">
                                                            <h4 class="text-white mb-2">قیمت لحظه ای بیتکوین به
                                                                تومان</h4>
                                                            <h3 class="text-white text-center mt-3" id="btc-price"></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class=" col-lg-8 ">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="media align-items-stretch">
                                                            <div class="p-2 text-center bg-success rounded-right pt-3">
                                                                <i class="icon-basket-loaded font-large-2 text-white"></i>
                                                            </div>
                                                            <div class="p-2 media-body">
                                                                <h6>سرمایه لحظه ای بیتکوین</h6>
                                                                <h5 class="text-bold-400 mb-0">4,65,879</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="media align-items-stretch">
                                                            <div class="p-2 text-center bg-success rounded-right pt-3">
                                                                <i class="icon-basket-loaded font-large-2 text-white"></i>
                                                            </div>
                                                            <div class="p-2 media-body">
                                                                <h6>مقدار خرید و فروش بیتکوین</h6>
                                                                <h5 class="text-bold-400 mb-0">4,65,879</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="media align-items-stretch">
                                                            <div class="p-2 text-center bg-success rounded-right pt-3">
                                                                <i class="icon-basket-loaded font-large-2 text-white"></i>
                                                            </div>
                                                            <div class="p-2 media-body">
                                                                <h6>مقدار پیشنهادی خرید</h6>
                                                                <h5 class="text-bold-400 mb-0">4,65,879</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="media align-items-stretch">
                                                            <div class="p-2 text-center bg-success rounded-right pt-3">
                                                                <i class="icon-basket-loaded font-large-2 text-white"></i>
                                                            </div>
                                                            <div class="p-2 media-body">
                                                                <h6>مقدار ذخیره تومانی</h6>
                                                                <h5 class="text-bold-400 mb-0">4,65,879</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    {{--    <script src="{{asset('admin/vendors/persian-datepicker/persian-date.min.js')}}"></script>--}}
    {{--    <script src="{{asset('admin/vendors/persian-datepicker/persian-datepicker.min.js')}}"></script>--}}
    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            $(".datepicker-started-at").pDatepicker({--}}
    {{--                "format": "YYYY/MM/DD",--}}
    {{--                "viewMode": "day",--}}
    {{--                "initialValue": false,--}}
    {{--                "autoClose": true,--}}
    {{--                "position": "auto",--}}
    {{--                "onlyTimePicker": false,--}}
    {{--                "onlySelectOnDate": true,--}}
    {{--                "calendarType": "persian",--}}
    {{--                "observer": true,--}}
    {{--                "responsive": true--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
    <script>
        $(document).ready(function () {

            $('.input-element').toArray().forEach(function(field){
                new Cleave(field, {
                    numeral: true
                });
     ral: true
            });



            function getThePrice() {
                $.ajax({
                    method: "POST",
                    url: "{{env('API_URL')}}",
                    contentType: "application/json",
                    data: JSON.stringify({
                        query: `
                        query getTokenRialAmount($tokenName : String!) {
                          getTokenRialAmount(tokenName : $tokenName){
                             price
                          }
                        }`,
                        variables: {
                            "tokenName": "btc"
                        }
                    }),
                    success: function (response) {
                        price = response.data.getTokenRialAmount.price
                        $("#btc-price").html(addCommas(price))
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
            }

            getThePrice();
            setInterval(function () {
                getThePrice()
            }, 60000);

            function addCommas(nStr) {
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2;
            }
        })
    </script>
@endsection
