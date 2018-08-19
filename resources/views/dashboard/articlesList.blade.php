@extends('layouts.panel')
@section('title')
    لیست مقالات
@endsection
@section('content')
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">لیست مقالات</h4>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped m-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center">نامک</th>
                            <th class="text-center">دسته</th>
                            <th class="text-center">وضعیت انتشار</th>
                            <th class="text-center">تصویر شاخص</th>
                            <th class="text-center">تاریخ ثبت</th>
                            <th class="text-center">نمایش</th>
                            <th class="text-center">ویرایش</th>
                            <th class="text-center">حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td class="text-center">{{ $article->id }}</td>
                                <td class="text-center">{{ $article->title }}</td>
                                <td class="text-center">{{ $article->slug }}</td>
                                <td class="text-center">{{ $article->category->name }}</td>
                                <td class="text-center">{{ $article->post_status }}</td>
                                <td class="text-center"><img src="{{Route('index')}}/articles/{{ $article->thumbnail }}" style="width: 50px;" alt=""></td>
                                <td class="text-center">{{ gregorian_to_jalali($article->created_at)}}</td>
                                <td class="text-center"><a href="">
                                        <button class="btn btn-inverse btn-sm">نمایش</button>
                                    </a></td>
                                <td class="text-center"><a href="{{Route('articlesEdit',['id' => $article->id])}}">
                                        <button class="btn btn-primary btn-sm">ویرایش</button>
                                    </a></td>
                                <td class="text-center"><a href="{{Route('articlesDelete',['id' => $article->id])}}">
                                        <button class="btn btn-danger btn-sm">حذف</button>
                                    </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card-box text-center">
            <ul class="pagination">
                @for ($i = 1; $i <= $buttonCount; $i++)
                    <li class="paginate_button @if($i == app('request')->input('page')) active @endif" aria-controls="datatable-responsive" tabindex="{{$i}}"><a href="?page={{$i}}">{{$i}}</a></li>
                @endfor
            </ul>
        </div>
    </div>


@endsection
@section('js')

@endsection