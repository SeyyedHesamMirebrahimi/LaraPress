@extends('layouts.panel')
@section('title')
    افزودن مقالات
@endsection
@section('content')
    <form class="form-horizontal" method="POST" action="{{Route('articlesEditPOST' , ['id' => $article->id])}}" role="form" enctype="multipart/form-data">
        <div class="col-sm-8">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">افزودن مقالات</h4>
                <div class="row">
                    <div class="col-lg-12">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12 mt-3">
                                <input type="text" value="{{$article->title}}" name="title" placehdumper="عنوان" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 mt-3">
                                <input type="text" value="{{$article->slug}}" name="slug" placehdumper="نامک" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            {{--<label class="col-md-2 control-label">عنوان </label>--}}
                            <div class="col-md-12">
                                <textarea name="content" id="editor"> {{$article->content}}</textarea>
                                </textarea>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div>

            <div class="card-box">
                <div class="form-group">
                    <label class="col-md-12 control-label text-r" style="margin-bottom: 20px;">تصویر شاخص </label>
                    <div class="col-md-12">
                        <input type="file" id="dropify" name="thumbnail" data-default-file="{{Route('index')}}/articles/{{$article->thumbnail}}">
                    </div>
                </div>
            </div>



        </div>
        <div class="col-sm-4">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label class="col-md-3 control-label text-r">وضعیت انتشار </label>
                            <div class="col-md-9">
                                <select name="post_status" class="form-control">
                                    <option value="publish" @if( $article->post_status == 'publish') selected @endif >منتشر شده</option>
                                    <option value="pending" @if( $article->post_status == 'pending') selected @endif >تعلیق شده</option>
                                    <option value="private" @if( $article->post_status == 'private') selected @endif >فقط اعضا</option>
                                    <option value="draft" @if( $article->post_status == 'draft') selected @endif >پیش نویس</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label text-r">تاریخ ارسال </label>
                            <div class="col-md-9">
                                <input type="text" name="created_at" class="jdate form-control" value="{{$article->created_at}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label text-r">ارسال نظرات </label>
                            <div class="col-md-9">
                                <select name="comment_status" class="form-control">
                                    <option value="yes" @if($article->comment_status == 'yes') selected @endif>فعال</option>
                                    <option value="no" @if($article->comment_status == 'no') selected @endif>غیر فعال</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label class="col-md-12 control-label pb-4 text-r" style="    padding-bottom: 20px;">انتخاب دسته مقاله</label>
                            <br>
                            <div class="col-md-12 mt-3">
                                <select class="form-control" name="category" id="">
                                    <option value="0">بدون دسته</option>
                                    @foreach( $categories as $cat)
                                        <option value="{{$cat->id}}" @if($article->category_id == $cat->id) selected @endif>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label class="col-md-12 control-label pb-4 text-r" style="    padding-bottom: 20px;">بهینه سازی موتور جستجو</label>
                            <br>
                            <div class="col-md-12 mt-3"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label text-r">کلیدواژه کانونی</label>
                            <div class="col-md-9">
                                <input type="text" name="meta_keyword" class="form-control" value="{{ unserialize($article->seo)['keyword'] }}" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">توضیح متا گوگل </label>
                            <div class="col-md-9">
                                <textarea name="meta_description" class="form-control" id="" cols="1" rows="1">{{ unserialize($article->seo)['description'] }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="m-t-5 py-3">
                            <button type="submit" class="btn btn-block btn-primary pull-right" name="button">ثبت</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
        $("#dropifyB").dropify({
            messages: {
                'default': 'فایل تصویر را اینجا رها کنید',
                'replace': 'Drag and drop or click to replace',
                'remove':  'Remove',
                'error':   'Ooops, something wrong happended.'
            }
        });
    </script>
@endsection