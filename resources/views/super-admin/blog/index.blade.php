@extends('super-admin.admin_layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title">لیست بلاگ / اخبار</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <table class="table table-striped table-inverse dataTable">
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
                                        <a class="danger p-0" href="{{route('super-admin.blogs.destroy',$blog->id)}}" data-original-title="" title="">
                                            <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                        </a>

                                        {{--                                        <a href="{{route('super-admin.user',$user->id)}}" class="success p-0" data-original-title="" title="">--}}
                                        {{--                                            <i class="fa fa-pencil font-medium-3 mr-2"></i>--}}
                                        {{--                                        </a>--}}

                                        {{--                                        <a onclick="event.preventDefault();document.getElementById('form-{{$key + 1}}').submit()"  class="danger p-0" data-original-title="" title="">--}}
                                        {{--                                            <i class="fa fa-trash-o font-medium-3 mr-2"></i>--}}
                                        {{--                                            <form id="form-{{$key + 1}}" action="{{route('super-admin.userDestroy',$user->id)}}" method="post">--}}
                                        {{--                                                @csrf--}}
                                        {{--                                                @method('DELETE')--}}

                                        {{--                                            </form>--}}
                                        {{--                                        </a>--}}

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
@section('scripts')
    <script src="{{asset('admin/js/tooltip.js')}}"></script>
@endsection