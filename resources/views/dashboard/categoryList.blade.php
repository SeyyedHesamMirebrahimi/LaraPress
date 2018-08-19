@extends('layouts.panel')
@section('title')
    لیست دسته مقالات
@endsection
@section('content')
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">لیست دسته مقالات</h4>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped m-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">نام</th>
                            <th class="text-center">نامک</th>
                            <th class="text-center">تصویر شاخص</th>
                            <th class="text-center">پس زمینه</th>
                            <th class="text-center">رنگ شاخص</th>
                            <th class="text-center">تاریخ ثبت</th>
                            <th class="text-center">ویرایش</th>
                            <th class="text-center">حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $category)
                            <tr>
                                @php
                                 $i = 1
                                @endphp
                                <th scope="row">{{$i}}</th>
                                <td class=" text-center">{{ $category->name }}</td>
                                <td class=" text-center">{{ $category->slug }}</td>
                                <td class=" text-center">@if($category->thumbnail != null)
                                        <img style="width: 50px;" src="{{asset('categorys')}}/{{$category->thumbnail}}" alt="">
                                    @endif
                                </td>
                                <td class=" text-center">@if($category->background != null)
                                        <img style="width: 50px;" src="{{asset('categorys')}}/{{$category->background}}" alt="">
                                    @endif
                                </td>
                                <td class="text-center text-center">@if($category->color != null)
                                        <button class="btn" style="background-color: {{$category->color}}"></button>
                                    @else
                                        <button class="btn bg-white" style="background-color: {{$category->color}}">
                                            <i class="fa fa-align-center"></i>
                                        </button>
                                    @endif
                                </td>

                                {{--<td class=" text-center"><button class="btn-sm btn-warning">{{ gregorian_to_jalali($category->created_at)}}</button></td>--}}
                                <td class=" text-center">
                                    <a href="{{Route('categoryEdit',['id' => $category->id])}}">
                                        <button class="btn-sm btn-primary">ویرایش</button>
                                    </a>
                                </td>
                                <td class=" text-center"><a href="{{Route('categoryDelete',['id' => $category->id])}}">
                                        <button class="btn-sm btn-danger">حذف</button>
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
        </div>
    </div>
@endsection
@section('js')

    @endsection