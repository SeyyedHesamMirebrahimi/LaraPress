@extends('layouts.panel')
@section('title')
    افزودن دسته مقالات
@endsection
@section('content')
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">افزودن دسته مقالات</h4>
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal" method="POST" action="{{Route('categoryAddPOST')}}" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-2 control-label">نام </label>
                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">نامک </label>
                            <div class="col-md-10">
                                <input type="text" name="slug" class="form-control" required>
                                <span class="text-muted" style="font-size: 10px">فقط انگلیسی وارد کنید</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">تصویر شاخص </label>
                            <div class="col-md-10">
                                <input type="file" id="dropify" name="thumbnail" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">تصویر پس زمینه </label>
                            <div class="col-md-10">
                                <input type="file" id="dropifyB" name="background" class="form-control">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">رنگ </label>
                            <div class="col-md-10">
                                <input type="text"  name="color" class="form-control">
                            </div>
                        </div>
                        <div class="m-t-5">
                            <button type="submit" class="btn btn-danger pull-right" name="button">ثبت</button>
                        </div>
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