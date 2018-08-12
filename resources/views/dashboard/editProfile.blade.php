@extends('layouts.panel')
@section('content')
<div class="col-sm-8">
                        		<div class="card-box">
                        			<h4 class="header-title m-t-0 m-b-30">ویرایش اطلاعات</h4>
                        			<div class="row">
                        				<div class="col-lg-12">
                        					<form class="form-horizontal" role="form" enctype="multipart/form-data">
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">نام و نام خانوادگی</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">آدرس رایانامه</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" name="email" class="form-control" value="  {{ $user->email }}" disabled>
	                                                </div>
	                                            </div>
                                              <div class="form-group">
	                                                <label class="col-md-2 control-label">شماره تماس</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
	                                                </div>
	                                            </div>
                                              <button type="submit" class="btn btn-primary" name="button">بروزرسانی اطلاعات</button>
	                                        </form>
                        				</div><!-- end col -->
                        			</div><!-- end row -->
                        		</div>







                            <div class="card-box">
                        			<h4 class="header-title m-t-0 m-b-30">بروزرسانی کلمه عبور</h4>
                        			<div class="row">
                        				<div class="col-lg-12">
                        					<form class="form-horizontal" role="form" enctype="multipart/form-data">
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
	                                                    <input type="password" name="confirm_password" class="form-control"  required>
	                                                </div>
	                                            </div>
                                              <button type="submit" class="btn btn-primary" name="button">بروزرسانی</button>
	                                        </form>
                        				</div><!-- end col -->
                        			</div><!-- end row -->
                        		</div>











                        	</div>
                          <div class="col-sm-4">



                            <div class="card-box">
                              <h4 class="header-title m-t-0 m-b-30">اطلاعات فعلی</h4>
                              
                                    </div>




                            <div class="card-box">
                              <h4 class="header-title m-t-0 m-b-30">تصویر پروفایل</h4>
                            <form class="form-horizontal" role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="file" id="dropify" name="profile">
                                                <small class="text-primary">برای بروزرسانی تصویر پروفایل از سرویس
                                                  <a href="http://gravatar.com">
                                                    گراواتار
                                                  </a>
                                                  هم میتوان استفاده کرد
                                                </small>
                                            </div>
                                        </div>
                                        <div class="form-group"><button type="submit" class="btn btn-primary btn-block" name="button">بروزرسانی</button>
                                        </div>
                                      </form>
                                    </div>
                          </div>
                          <script type="text/javascript">
                            $("#dropify").dropify();
                          </script>

@endsection
