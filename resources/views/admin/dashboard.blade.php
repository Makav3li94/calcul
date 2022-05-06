@extends('admin.admin_layout',['title' => 'داشبرد'])

@section('content')
    @if(auth()->guard('web')->check())
        <section id="shopping-cart">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title-wrap bar-warning">
                                <h4 class="card-title">سرمایه گذاری های من</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-block">

                                <div class="table-responsive">
                                    <table id="recent-orders" class="table table-hover table-xl mb-0">
                                        <thead>
                                        <tr>
                                            <th class="border-top-0">ردیف</th>
                                            <th class="border-top-0">کل سرمایه</th>
                                            <th class="border-top-0">قیمت خرید بیتکوین</th>
                                            <th class="border-top-0">بازه پایین</th>
                                            <th class="border-top-0">بازه بالا</th>
                                            <th class="border-top-0">وضعیت</th>
                                            <th class="border-top-0">مشاهده</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($invests as $key=>$invest)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{number_format($invest->budget)}}</td>
                                                <td>{{number_format($invest->purchase_price)}}</td>
                                                <td>{{number_format($invest->low_range)}}</td>
                                                <td>{{number_format($invest->high_rang)}}</td>
                                                <td>بخرید || بفروشید</td>
                                                <td><a href="{{route('user.invest.show',$invest->id)}}"><i
                                                            class="fa fa-eye"></i></a></td>
                                            </tr>
                                        @empty

                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif(auth()->guard('admin')->check())

    @endif

@endsection
