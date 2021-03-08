@extends('Frontend.layout.main')
@section('style')
    <title>Đối tác của Xưởng Mộc</title>
@endsection
@section('content')
<!-- BANNER -->
<div class="banner-abt-wrap">
    <div class="img">
        <img src="/frontend/images/AnhCat/banner-doi-tac.png" alt="Các đối tác của xưởng mộc giá tốt">
    </div>
    <div class="banner-content d-flex justify-content-center align-items-center w-100 h-100">
        <h1 class="text-center">đối tác</h1>
    </div>
</div>
<!-- CONTENT -->
<div class="container">
    <div class="introduce partner">
        @foreach($vendors as $vd)
        <div class="partner-box d-flex">
            <div class="row w-100">
                <div class="col-md-3 col-lg-4 d-flex align-items-center">
                    <div class="img w-100 px-2 px-lg-5">
                        <img class="d-flex justify-content-center align-items-center m-auto" src="{{asset($vd->image)}}" alt="{{$vd->name}}">
                    </div>
                </div>
                <div class="col-md-9 col-lg-8 d-flex align-items-center">
                    <div class="content text-justify">
                        <h3 class="title">{!! $vd->content_title !!}</h3>
                        <p class="desc">{!! $vd->content_description !!}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
