@extends('layouts.panel')
@section('title')
پروفایل کاربر
@endsection
@section('content')
    <div class="col-sm-8">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">ویرایش اطلاعات</h4>
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal" method="POST" action="{{Route('editProfilePOST')}}" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-2 control-label">نام </label>
                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">نام خانوادگی </label>
                            <div class="col-md-10">
                                <input type="text" name="family" class="form-control" value="{{ $user->family }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">آدرس رایانامه</label>
                            <div class="col-md-10">
                                <input type="text" name="email" class="form-control" value="  {{ $user->email }}"
                                       disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">شماره تماس</label>
                            <div class="col-md-10">
                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">تخصص ها</label>
                            <div class="col-md-10">
                                <input type="text" name="experts" class="form-control" value="{{ $user->experts }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-input1-group2">تلگرام</label>
                            <div class="input-group m-t-10 col-md-10 m-r-2" style="padding-right: 12px;
                                padding-left: 10px;">
                                <input type="text" id="example-input2-group2" name="telegram" class="form-control" placeholder="" value="{{ $user->telegram  }}">
                                <span class="input-group-btn">
                                                        <button type="button" class="btn waves-effect waves-light btn-primary">@</button>
                                                        </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-input1-group2">اینستاگرام</label>
                            <div class="input-group m-t-10 col-md-10 m-r-2" style="padding-right: 12px;
                                padding-left: 10px;">
                                <input type="text" id="example-input2-group2" name="instagram" class="form-control" value="{{$user->instagram}}" placeholder="">
                                <span class="input-group-btn">
                                                        <button type="button" class="btn waves-effect waves-light btn-primary">@</button>
                                                        </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-input1-group2">اکانت تویتر</label>
                            <div class="input-group m-t-10 col-md-10 m-r-2" style="padding-right: 12px;
                                padding-left: 10px;">
                                <input type="text" id="example-input2-group2" name="twitter" value="{{  $user->twitter }}" class="form-control" placeholder="">
                                <span class="input-group-btn">
                                                        <button type="button" class="btn waves-effect waves-light btn-primary">@</button>
                                                        </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-input1-group2">اکانت فیس بوک</label>
                            <div class="input-group m-t-10 col-md-10 m-r-2" style="padding-right: 12px;
                                padding-left: 10px;">
                                <input type="text" id="example-input2-group2" name="facebook" value="{{  $user->facebook }}" class="form-control" placeholder="">
                                <span class="input-group-btn">
                                                        <button type="button" class="btn waves-effect waves-light btn-primary">facebook.com</button>
                                                        </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-input1-group2">اکانت لینکدین</label>
                            <div class="input-group m-t-10 col-md-10 m-r-2" style="padding-right: 12px;
                                padding-left: 10px;">
                                <input type="text" id="example-input2-group2" name="linkedin" value="{{  $user->linkedin }}" class="form-control" placeholder="">
                                <span class="input-group-btn">
                                                        <button type="button" class="btn waves-effect waves-light btn-primary">linkedin.com</button>
                                                        </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">بیوگرافی</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="biography" rows="5">{{$user->biography}}</textarea>
                            </div>
                        </div>
                        <div class="m-t-5">
                            <button type="submit" class="btn btn-primary pull-right" name="button">بروزرسانی اطلاعات</button>
                            <div class="pull-left text-danger">عضو از تاریخ {{ gregorian_to_jalali($user->created_at)}}</div>
                        </div>
                    </form>
                </div><!-- end col -->
            </div><!-- end row -->
        </div>





    </div>
    <div class="col-sm-4">


        {{--<div class="bg-picture card-box">--}}
            {{--<div class="profile-info-name">--}}
                {{--<img src="assets/images/profile.jpg" class="img-thumbnail img-responsive" alt="profile-image">--}}

                {{--<div class="profile-info-detail">--}}
                    {{--<h3 class="m-t-0 m-b-0">{{ $user->name  }}</h3>--}}
                    {{--<p class="text-muted m-b-20"><i>{{$user->experts}}</i></p>--}}
                    {{--<p>{{$user->biography}}</p>--}}

                    {{--<div class="button-list m-t-20">--}}
                        {{--@if($user->facebook != null)--}}
                            {{--<a href="https://facebook.com/{{$user->facebook}}">--}}
                                {{--<button type="button" class="btn btn-facebook btn-sm waves-effect waves-light">--}}
                                    {{--<i class="fa fa-facebook"></i>--}}
                                {{--</button>--}}
                            {{--</a>--}}
                            {{--@endif--}}

                            {{--@if($user->twitter != null)--}}
                                {{--<a href="https://twitter.com/{{$user->twitter}}">--}}
                        {{--<button type="button" class="btn btn-sm btn-twitter waves-effect waves-light">--}}
                            {{--<i class="fa fa-twitter"></i>--}}
                        {{--</button>--}}
                                {{--</a>--}}
                            {{--@endif--}}
                            {{--@if($user->linkedin != null)--}}
                                {{--<a href="https://linkedin.com/{{$user->linkedin}}">--}}
                        {{--<button type="button" class="btn btn-sm btn-linkedin waves-effect waves-light">--}}
                            {{--<i class="fa fa-linkedin"></i>--}}
                        {{--</button>--}}
                            {{--</a>--}}
                            {{--@endif--}}
                            {{--@if($user->telegram != null)--}}
                                {{--<a href="https://telegram.com/{{$user->telegram}}">--}}
                        {{--<button type="button" class="btn btn-sm btn-dribbble waves-effect waves-light">--}}
                            {{--<i class="fa fa-telegram"></i>--}}
                        {{--</button>--}}
                            {{--</a>--}}
                            {{--@endif--}}
                            {{--@if($user->instagram != null)--}}
                                {{--<a href="https://instagram.com/{{$user->instagram}}">--}}
                        {{--<button type="button" class="btn btn-sm bg-instagram waves-effect waves-light">--}}
                            {{--<i class="fa fa-instagram"></i>--}}
                        {{--</button>--}}
                            {{--</a>--}}
                            {{--@endif--}}

                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="clearfix"></div>--}}
            {{--</div>--}}
        {{--</div>--}}


        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">تصویر پروفایل</h4>
            <form class="form-horizontal" role="form" method="POST" action="{{ Route('updateProfileAvatarPOST') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="file" id="dropify" name="avatar" data-default-file="{{ asset("avatars/".$user->avatar) }}" >
                        <small class="text-primary">برای بروزرسانی تصویر پروفایل از سرویس
                            <a href="http://gravatar.com">
                                گراواتار
                            </a>
                            هم میتوان استفاده کرد
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" name="button">بروزرسانی</button>
                </div>
            </form>
        </div>



        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">بروزرسانی کلمه عبور</h4>
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal" method="POST" action="{{Route('updatePasswordPOST')}}" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-2 control-label">کلمه عبور فعلی</label>
                            <div class="col-md-10">
                                <input type="password" name="current_password" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">کلمه عبور جدید</label>
                            <div class="col-md-10">
                                <input type="password" name="new_password" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">تکرار کلمه عبور جدید</label>
                            <div class="col-md-10">
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="button">بروزرسانی</button>
                    </form>
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
    </div>


@endsection
@section('js')
<script>
    $("#dropify").dropify({
        messages: {
            'default': 'فایل تصویر را اینجا رها کنید',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
        }
    });
</script>
    @endsection