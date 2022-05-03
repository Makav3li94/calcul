@extends('super-admin.admin_layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title">لیست کاربران</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <table class="table table-striped table-inverse dataTable">
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
                                        @foreach($user->metas as $relic)
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="{{$relic->title}}" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="{{asset($relic->image)}}"
                                                     alt="{{$relic->image}}">
                                            </li>
                                        @endforeach
                                    </td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->mobile}}</td>
                                    <td>
                                        <a href="{{route('super-admin.user',$user->id)}}" class="success p-0" data-original-title="" title="">
                                            <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                        </a>


                                        <a onclick="event.preventDefault();document.getElementById('form-{{$key + 1}}').submit()"  class="danger p-0" data-original-title="" title="">
                                            <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                            <form id="form-{{$key + 1}}" action="{{route('super-admin.userDestroy',$user->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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
    </div>
@endsection