@extends('super-admin.admin_layout')
@section('styles')
    <link rel="stylesheet" href="{{asset('admin/vendors/dropify/css/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/persian-datepicker/persian-datepicker.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/vendors/summernote/dist/summernote.css')}}"/>
@endsection
@section('content')
    <form class="form" method="post" action="{{route('super-admin.blogs.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title" id="basic-layout-form">اطلاعات اخبار</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <div class="form-body">
                                <div class="">
                                    <div class="form-group row">
                                        <label class="col-md-4" for="title"> عنوان </label>
                                        <div class=" col-md-8">
                                            <input type="text" id="title" class="form-control" name="title" value="{{old('title') ?? ''}}">
                                        </div>
                                        @if($errors->has('title'))
                                            <small class="text-danger">{{$errors->first('title')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4" for="slug"> اسلاگ </label>
                                        <div class=" col-md-8">
                                            <input type="text" id="slug" class="form-control" name="slug" value="{{old('slug') ?? ''}}">
                                        </div>
                                        @if($errors->has('slug'))
                                            <small class="text-danger">{{$errors->first('slug')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label for="start_at" class="col-md-4"> تاریخ انتشار </label>
                                        <div class="col-md-8">
                                            <input type="text" id="publish_at" class="form-control datepicker-started-at" name="start_at" value="{{old('publish_at') ?? ''}}"
                                                   readonly>
                                        </div>
                                        @if($errors->has('publish_at'))
                                            <small class="text-danger">{{$errors->first('publish_at')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="category_id">دسته بندی خبر </label>
                                        <div class="col-md-8">
                                            <select id="category_id" name="category_id" class="form-control" data-placeholder="لطفا یک مورد را انتخاب کنید">
                                                @foreach($categories as $key=> $category )
                                                    <option value="{{$key}}" {{old('category_id') == $key ? 'selected' : ''}}>{{$category}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if($errors->has('category_id'))
                                            <small class="text-danger">{{$errors->first('category_id')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="category_id">خلاصه ( لازم برای سئو !) </label>
                                        <div class="col-md-8">
                                            <textarea name="excerpt" class="form-control" id="" cols="3" rows="2" placeholder="خلاصه خبر">{{old('excerpt') ?? ''}}</textarea>
                                        </div>
                                        @if($errors->has('excerpt'))
                                            <small class="text-danger">{{$errors->first('excerpt')}}</small>
                                        @endif
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-warning">
                            <h4 class="card-title" id="basic-layout-colored-form-control">تصویر خبر</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="form-group pb-3">
                                            <input type="file" name="image" class="dropify" accept="image/png,image/jpeg"
                                                   data-allowed-file-extensions="pdf png jpeg jpg rar zip"
                                                   data-max-file-size="2M">
                                        </div>
                                    </div>
                                    @if($errors->has('image'))
                                        <small class="text-danger">{{$errors->first('image')}}</small>
                                    @endif
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title" id="basic-layout-form">متن خبر</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">

                            <div class="form-body">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <textarea name="body" rows="10" placeholder="متن بلاگ ... " class="summernote">{{old('body')}}</textarea>
                                    </div>
                                    @if($errors->has('body'))
                                        <small class="text-danger">{{$errors->first('body')}}</small>
                                    @endif
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
        </div>

    </form>
@endsection
@section('scripts')
    <script src="{{asset('admin/vendors/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('admin/vendors/persian-datepicker/persian-date.min.js')}}"></script>
    <script src="{{asset('admin/vendors/persian-datepicker/persian-datepicker.min.js')}}"></script>
    <script src="{{asset('admin/vendors/summernote/dist/summernote.js')}}"></script>
    <script>

        $(document).ready(function () {

            $('.dropify').dropify({
                messages: {}
            });

            $(".datepicker-started-at").pDatepicker({
                "format": "YYYY/MM/DD",
                "viewMode": "day",
                "initialValue": false,
                "autoClose": true,
                "position": "auto",
                "onlyTimePicker": false,
                "onlySelectOnDate": true,
                "calendarType": "persian",
                "observer": true,
                "responsive": true
            });
        });
    </script>
@endsection