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
                                                <th class="border-top-0">وضعیت</th>
                                                <th class="border-top-0">نام اثر</th>
                                                <th class="border-top-0">دسته بندی</th>
                                                <th class="border-top-0">عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

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
