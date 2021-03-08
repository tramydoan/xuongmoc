@extends('Frontend.layout.main')
@section('style')
    <title>Sản Phẩm</title>
@endsection
@section('content')
    <!-- BANNER -->
    <div class="banner-product">
        <div class="banner-prod">
            @foreach($banner as $bn)
                @if($bn->is_page == 1)
                    <div class="item">
                        <div class="slick-prev"><i class="fa fa-chevron-left"></i></div>
                        <img src="{{asset($bn->image)}}" alt="{{$bn->title}}">
                        <div class="slick-next"><i class="fa fa-chevron-right"></i></div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <!-- CONTENT -->
    <div class="product-wrap container">
        @foreach($list as $item)
            @if(count($item['product']) === 0)
            @else
            <div class="list-product">
                <div class="d-flex justify-content-between box-title">
                    <h2 class="header-prod"> {{$item['category']->name}} </h2>
                    <p class="see-all"><a href="{{route('xuongmoc.danhmuc' , ['slug' => $item['category']->slug])}}"> Xem tất cả </a></p>
                </div>
                <div class="box-product">
{{--                    @if(count($item['product']) === 0)--}}
{{--                        <p class="text-center p-5">Không có sản phẩm nào.</p>--}}
{{--                    @else--}}
                    <div class="row">
                        @foreach($item['product'] as $data)
                            <div class="col-lg-3 col-sm-6">
                                <div class="product">
                                    <div class="img">
                                        <a href="{{route('xuongmoc.chitietsanpham',['slug'=>$data->slug])}}">
                                            <img src="{{asset($data->image)}}" alt="{{$data->name}}"
                                             class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <p class="name"><a href="{{route('xuongmoc.chitietsanpham',['slug'=>$data->slug])}}"> {{$data->name}}</a></p>
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
                    </div>
{{--                    @endif--}}
                </div>
            </div>
            @endif
        @endforeach
    </div>
@endsection
