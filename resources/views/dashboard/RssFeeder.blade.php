@extends('layouts.panel')
@section('content')
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">آخرین اخبار</h4>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped m-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>تیتر</th>
                            <th>مشاهده</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1
                        @endphp
                        @foreach($siteFeeds as $item)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{ $item->title }}</td>
                                <td><a href="{{ $item->link }}">
                                        <button class="btn btn-primary">مشاهده</button>
                                    </a></td>
                                @php
                                    $i++
                                @endphp
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
    </div>
@endsection
