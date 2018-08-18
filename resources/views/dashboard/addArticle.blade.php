@extends('layouts.panel')
@section('title')
    افزودن مقالات
@endsection
@section('content')
    <div class="col-sm-8">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">افزودن مقالات</h4>
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal" method="POST" action="{{Route('categoryAddPOST')}}" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12 mt-3">
                                <input type="text" name="title" placeholder="عنوان" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 mt-3">
                                <input type="text" name="slug" placeholder="نامک" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            {{--<label class="col-md-2 control-label">عنوان </label>--}}
                            <div class="col-md-12">
                                <textarea name="content" id="editor" cols="0" rows="30"></textarea>
                            </div>
                        </div>


                    </form>
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
        <div class="card-box" style="    margin-top: 70px;">
           <div class="row">
               <div class="col-sm-12">
                   <div class="m-t-5 py-3">
                       <button type="submit" class="btn btn-block btn-primary pull-right" name="button">ثبت</button>
                   </div>
               </div>
           </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <label class="col-md-3 control-label">وضعیت انتظار </label>
                        <div class="col-md-9">
                            <select name="post_status" class="form-control">
                                <option value="publish" selected>منتشر شده</option>
                                <option value="pending">تعلیق شده</option>
                                <option value="publish">فقط اعضا</option>
                                <option value="publish">پیش نویس</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 control-label">تاریخ ارسال </label>
                        <div class="col-md-9">
                            <input type="text" name="created_at" class="jdate form-control" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 control-label">ارسال نظرات </label>
                        <div class="col-md-9">
                            <select name="post_status" class="form-control">
                                <option value="yes" selected>فعال</option>
                                <option value="no">غیر فعال</option>
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
                        <label class="col-md-12 control-label pb-4" style="    padding-bottom: 20px;">انتخاب دسته مقاله</label>
                        <br>
                        <div class="col-md-12 mt-3">
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="option1">
                                <label for="inlineCheckbox1"> Inline One </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <label class="col-md-12 control-label pb-4" style="    padding-bottom: 20px;">بهینه سازی موتور جستجو</label>
                        <br>
                        <div class="col-md-12 mt-3">

                        </div>
                    </div>




                    <div class="form-group row">
                        <label class="col-md-3 control-label">کلیدواژه کانونی</label>
                        <div class="col-md-9">
                            <input type="text" name="created_at" class="form-control" value="" required="">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 control-label">توضیح متا گوگل </label>
                        <div class="col-md-9">
                            <textarea name="" class="form-control" id="" cols="1" rows="1"></textarea>
                        </div>
                    </div>





                </div>
            </div>
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