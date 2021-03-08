@extends('Frontend.layout.main')
@section('style')
    <title>Kết quả tìm kiếm - Xưởng Mộc Hoàng Hoan</title>
@endsection
@section('content')
    <!-- CONTENT -->
    <div class="container">
        <div class="box-search">
            <h1 class="header-search"> Kết quả tìm kiếm </h1>
            <div class="subtext-result d-flex justify-content-between">
                <div class="subtxt-key">
                    <p>Kết quả tìm kiếm cho <strong>"{{$key}}"</strong></p>
                </div>
                <div class="subtxt-count">
                    <p>Có {{$products->total()}} sản phẩm cho tìm kiếm</p>
                </div>
            </div>
            <div class="row search-list-results">
                @if($products->total() != 0)
                    @foreach($products as $product)
                        <div class="col-lg-3 col-sm-6">
                            <div class="product">
                                <div class="img">
                                    <a href="#">
                                        <img src="{{$product->image}}" alt="Bàn Làm Việc" class="img-fluid">
                                    </a>
                                </div>
                                <div class="info">
                                    <p class="name"><a href="#"> {{Str::limit($product->name,15,'...')}}</a></p>
                                    <p class="vote">
                                        <span><i class="fas fa-star" aria-hidden="true"></i></span>
                                        <span><i class="fas fa-star" aria-hidden="true"></i></span>
                                        <span><i class="fas fa-star" aria-hidden="true"></i></span>
                                        <span><i class="fas fa-star" aria-hidden="true"></i></span>
                                        <span><i class="fas fa-star" aria-hidden="true"></i></span>
                                    </p>
                                    <p class="desc">{{$product->description}} </p>

                                    <p class="price"><span>{{number_format($product->price)}}</span> VNĐ </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center w-100 p-5">Không có sản phẩm nào.</p>
                @endif

            </div>
            <div class="d-flex justify-content-center align-content-center mt-3">
                {{$products->links()}}
            </div>
        </div>
    </div>
@endsection
