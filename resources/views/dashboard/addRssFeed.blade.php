@extends('layouts.panel')
@section('title')
  مدیریت خوراک خوان
@endsection
@section('content')
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">مدیریت خوراک خوان</h4>
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal" method="POST" action="{{Route('addRssFeedPOST')}}" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-2 control-label">آدرس </label>
                            <div class="col-md-10">
                                <input type="url" name="url" class="form-control" required>
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
<div class="col-sm-12">
    <div class="card-box">
        <h4 class="header-title m-t-0 m-b-30">لیست منبع های شما</h4>
        <table class="table table-striped m-0">
            <thead>
            <tr>
                <th>#</th>
                <th>آدرس</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>


                @foreach($feed as $feed)
                    <tr>
                        <div class="display-none">@php
                                $i = 1
                            @endphp</div>
                <th scope="row">{{$i}}</th>
                <td>{{ $feed->url }}</td>
                <td><a href="{{  Route('deleteRssFeed', ['id' => $feed->id]) }}">
                        <button class="btn btn-danger">حذف</button>
                    </a></td>
                    @php
                        $i++
                    @endphp
                    </tr>
                @endforeach

            </tbody>
        </table>

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