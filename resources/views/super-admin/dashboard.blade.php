@extends('super-admin.admin_layout')

@section('content')

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="px-3 py-3">
                        <div class="media">
                            <div class="media-body text-left align-self-center">
                                <i class="icon-pencil info font-large-2 float-right"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3>{{$userCount}}</h3>
                                <span>کاربران</span>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="px-3 py-3">
                        <div class="media">
                            <div class="media-body text-left align-self-center">
                                <i class="icon-speech warning font-large-2 float-right"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3>1</h3>
                                <span>آثار</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="px-3 py-3">
                        <div class="media">
                            <div class="media-body text-left align-self-center">
                                <i class="icon-graph success font-large-2 float-right"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3>1</h3>
                                <span>شرکت کنندگان</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="px-3 py-3">
                        <div class="media">
                            <div class="media-body text-left align-self-center">
                                <i class="icon-pointer danger font-large-2 float-right"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3>1</h3>
                                <span> آرا</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row match-height">
        <div class="col-12 col-md-6" id="recent-sales">
            <div class="card">
                <div class="card-header">
                    <div class="card-title-wrap bar-primary">
                        <h4 class="card-title">کاربران اخیر
                        </h4>
                    </div>
                    <a class="heading-elements-toggle">
                        <i class="la la-ellipsis-v font-medium-3"></i>
                    </a>
                </div>
                <div class="card-content mt-1">
                    <div class="table-responsive">
                        <table class="table table-hover table-xl mb-0" id="recent-orders">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>آثار</th>
                                <th>ایمیل</th>
                                <th>موبایل</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key=> $user)
                                <tr>
                                    <th scope="row">{{$key + 1}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>

                                    </td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->mobile}}</td>
                                    <td>
                                        <a href="{{route('super-admin.user',$user->id)}}" class="success p-0" data-original-title="" title="">
                                            <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                        </a>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6" id="recent-sales">
            <div class="card">
                <div class="card-header">
                    <div class="card-title-wrap bar-primary">
                        <h4 class="card-title">آثار اخیر
                        </h4>
                    </div>
                    <a class="heading-elements-toggle">
                        <i class="la la-ellipsis-v font-medium-3"></i>
                    </a>
                </div>
                <div class="card-content mt-1">
                    <div class="table-responsive">
                        <table class="table table-hover table-xl mb-0" id="recent-orders">
                            <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">نام</th>
                                <th class="border-top-0">وضعیت</th>
                                <th class="border-top-0">لوگو</th>
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

    <div class="row match-height">
        <div class="col-12 col-md-8" id="recent-sales">
            <div class="card">
                <div class="card-header">
                    <div class="card-title-wrap bar-primary">
                        <h4 class="card-title">اخبار اخیر
                        </h4>
                    </div>
                    <a class="heading-elements-toggle">
                        <i class="la la-ellipsis-v font-medium-3"></i>
                    </a>
                </div>
                <div class="card-content mt-1">
                    <div class="table-responsive">
                        <table class="table table-hover table-xl mb-0" id="recent-orders">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>تصویر</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $key=> $blog)
                                <tr>
                                    <th scope="row">{{$key + 1}}</th>
                                    <td>{{$blog->title}}</td>
                                    <td>
                                        <ul class="list-unstyled users-list m-0">
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="{{$blog->title}}" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="{{asset($blog->image)}}"
                                                     alt="{{$blog->title}}">
                                            </li>
                                        </ul>
                                    </td>
                                    <td>بی وضعیت !</td>
                                    <td>
                                        <a href="{{route('super-admin.blogs.edit',$blog->id)}}"  class="success p-0" data-original-title="" title="">
                                            <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-12">
            <div class="card" style="height: 431px;">
                <div class="card-header">
                    <div class="card-title-wrap bar-danger">
                        <h4 class="card-title">آرای اخیر</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-12 timeline-left" id="activity">
                        <div class="timeline">
                            <ul class="list-unstyled base-timeline activity-timeline">
                                <li class="">
                                    <div class="timeline-icon bg-danger">
                                        <i class="fa fa-tasks"></i>
                                    </div>
                                    <div class="act-time">امروز</div>
                                    <div class="base-timeline-info">
                                        <a href="#" class="text-uppercase text-danger">وظیفه اضافه شده است</a>
                                    </div>
                                    <small class="text-muted">
                                        25 دقیقه پیش
                                    </small>
                                </li>
                                <li class="">
                                    <div class="timeline-icon bg-primary">
                                        <i class="fa fa-handshake-o"></i>
                                    </div>
                                    <div class="act-time">دیروز</div>
                                    <div class="base-timeline-info">
                                        <a href="#" class="text-uppercase text-primary">معامله اضافه شده</a>
                                    </div>
                                    <small class="text-muted">
                                        23 ساعت پیش
                                    </small>
                                </li>
                                <li class="">
                                    <div class="timeline-icon bg-dark">
                                        <i class="fa fa-tasks"></i>
                                    </div>
                                    <div class="act-time">09 مهر</div>
                                    <div class="base-timeline-info">
                                        <a href="#" class="text-uppercase text-dark">وظیفه به روز شده است</a>
                                    </div>
                                    <small class="text-muted">
                                        15 روز پیش
                                    </small>
                                </li>
                                <li class="">
                                    <div class="timeline-icon bg-warning">
                                        <i class="fa fa-handshake-o"></i>
                                    </div>
                                    <div class="act-time">04 مهر</div>
                                    <div class="base-timeline-info">
                                        <a href="#" class="text-uppercase text-warning">وظیفه شروع شده است</a>
                                    </div>
                                    <small class="text-muted">
                                        20 روز پیش
                                    </small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
