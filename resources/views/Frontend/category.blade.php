@extends('Frontend.layout.main')
@section('style')
    <title>{{$cate->name}}</title>
@endsection
@section('content')
    <!-- BANNER -->
    <div class="banner-product">
        <div class="banner-prod">
            @foreach($banner as $bn)
                <div class="item">
                    <div class="slick-prev"><i class="fa fa-chevron-left"></i></div>
                    <img src="{{asset($bn->image)}}" alt="{{$bn->title}}">
                    <div class="slick-next"><i class="fa fa-chevron-right"></i></div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- CONTENT -->

    <div class="product-wrap container">
        <div class="list-product">
            <div class="d-flex justify-content-between box-title">
                <h2 class="header-prod"> {{$cate->name}} </h2>
            </div>
            <div class="box-product">

                <!-- Kiểm tra biến $products được truyền sang từ ProductController -->
                <!-- Nếu biến $products không tồn tại hoặc có số lượng băng 0 (không có sản phẩm nào) thì hiển thị thông báo -->
                @if(!isset($product) || count($product) === 0)
                    <p class="text-center p-5">Không có sản phẩm nào.</p>
                @else

                    <div class="row">
                        @foreach($product as $data)
                            <div class="col-lg-3 col-sm-6">
                                <div class="product">
                                    <div class="img">
                                        <a href="{{route('xuongmoc.chitietsanpham',['slug'=>$data->slug])}}">
                                        <img src="{{asset($data->image)}}" alt="{{$data->name}}"
                                             class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <p class="name"><a href="#"> {{$data->name}}</a></p>
                                        <p class="vote">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                        </p>
                                        <p class="desc">{{$data->description}} </p>

                                        <p class="price"><span>{{number_format($data->price)}}</span> VNĐ </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
            </div>
        </div>
    </div>
@endsection
