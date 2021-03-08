@extends('Frontend.layout.main')
@section('style')
    <title>Tin Tức</title>
@endsection
@section('content')
    <!-- CONTENT -->
    <div class="container">
        <div class="box-news">
            <h1 class="header-news"> Tin tức </h1>
            <div class="row wrapper-news">
                @foreach($article as $art)
                <div class="col-md-6 col-lg-4">
                    <div class="new-item">
                        <div class="img">
                            <a href="{{route('xuongmoc.chitiettintuc',['slug'=>$art->slug])}}">
                                <img src="{{asset($art->image)}}" alt="{{$art->title}}" class="img-fluid">
                            </a>
                        </div>
                        <div class="title">
                            <h4><a href="{{route('xuongmoc.chitiettintuc',['slug'=>$art->slug])}}">{!! $art->title !!}</a></h4>
{{--                            <p class="desc"></p>--}}
                            {!! $art->description !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center align-content-center mt-3">
                {{$article->links()}}
            </div>
        </div>
    </div>

@endsection
