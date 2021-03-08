@extends('Frontend.layout.main')
@section('style')
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/frontend/css/adminlte.min.css">
    <title>{{$product->name}}</title>
@endsection
@section('content')
    <!-- CONTENT -->
    <div class="container">
        <div class="breadcumb">
            <div class="d-flex align-items-center">
                <p><a href="{{route('xuongmoc')}}">Trang chủ </a></p>
                <span> <i class="fas fa-angle-right"></i> </span>
                <p><a href="{{route('xuongmoc.danhmuc' , ['slug' => $category->slug])}}">{{$category->name}}</a></p>
                <span> <i class="fas fa-angle-right"></i> </span>
                <p><a href="#"> Chi tiết sản phẩm </a></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="product-detail">
            <h1> {{$product->name}} </h1>
            <div class="row mb-5 mt-3">
                <div class="col-lg-8">
                    <div class="detail-img">
                        <img src="{{asset($product->image)}}" class="product-image" alt="Product Image">
                    </div>
                    <div class="product-image-thumbs">
                        @foreach($product->product_Images as $img)
                            <div class="product-image-thumb"><img src="/{{$img->image}}" alt="Product Image">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <p class="material"> Chất liệu </p>
                    <div class="d-flex material ">
                        @php
                            $temp = null;
                        @endphp
                        @foreach($product->prd as $key => $item)
                            @php
                               if ($key == 0){
                                    $temp = $item->id;
                                }
                            @endphp
                            <button class="btn-material {{$key == 0 ? 'active' : ''}}" data-id="{{$item->id}}">
                                {{$item->name ?? 'Trống'}}
                            </button>
                        @endforeach
                    </div>
                    <div class="box-material">
                        <input type="hidden" name="material" value="{{$temp}}">
                    </div>
                    <div class="price">
                        @if($product->sale == null)
                            <p class="new">{{number_format($product->price)}} VNĐ</p>
                        @else
                            <p class="old">{{number_format($product->price)}}VNĐ</p>
                            <p class="new">{{number_format($product->sale)}} VNĐ</p>
                        @endif
                    </div>

                    <a href="{{route('xuongmoc.add-cart', ['id'=>$product->id])}}" type="button" id="add-to-cart"
                            class="button dark hvr-sweep-to-right btn-addtocart" name="add">Thêm vào giỏ
                    </a>

                    <div class="certify d-flex align-items-center">
                        <i class="fas fa-shield-alt mr-2"></i>
                        <p class="mb-0">Bảo hành sản phẩm lên đến 12 tháng</p>
                    </div>
                </div>
            </div>

            <div class="detail-info">
                <nav class="d-flex">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-dt-tab" data-toggle="tab" href="#nav-dt" role="tab"
                           aria-controls="nav-dt" aria-selected="true">Đặc trưng</a>
                        <a class="nav-link" id="nav-ts-tab" data-toggle="tab" href="#nav-ts" role="tab"
                           aria-controls="nav-ts" aria-selected="false">Thông số</a>
                        <a class="nav-link" id="nav-bq-tab" data-toggle="tab" href="#nav-bq" role="tab"
                           aria-controls="nav-bq" aria-selected="false">Bảo quản</a>
                        <a class="nav-link" id="nav-bh-tab" data-toggle="tab" href="#nav-bh" role="tab"
                           aria-controls="nav-bht" aria-selected="false">Bảo hành</a>
                        <a class="nav-link" id="nav-ck-tab" data-toggle="tab" href="#nav-ck" role="tab"
                           aria-controls="nav-ck" aria-selected="false">Cam kết</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-dt" role="tabpanel" aria-labelledby="nav-dt-tab">
                        {!! $product->featured !!}
                    </div>
                    <div class="tab-pane fade" id="nav-ts" role="tabpanel" aria-labelledby="nav-ts-tab">
                        {!! $product->specifications !!}
                    </div>
                    <div class="tab-pane fade" id="nav-bq" role="tabpanel" aria-labelledby="nav-bq-tab">
                        {!! $product->preservation !!}
                    </div>
                    <div class="tab-pane fade" id="nav-bh" role="tabpanel" aria-labelledby="nav-bh-tab">
                        {!! $product->guarantee !!}
                    </div>
                    <div class="tab-pane fade" id="nav-ck" role="tabpanel" aria-labelledby="nav-ck-tab">
                        {!! $product->commitment !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relate-product-wrapper container">
        <div class="relate-product">
            <div class="d-flex justify-content-between header-re-prod">
                <h2> Sản phẩm tương tự </h2>
            </div>
            <div class="box-relate-product">
                <div class="row">
                    @foreach($related_product as $rl_prd)
                        @if($rl_prd->name!=$product->name)
                            <div class="col-lg-3 col-sm-6">
                                <div class="product">
                                    <div class="img">
                                        <a href="{{route('xuongmoc.chitietsanpham',['slug'=>$rl_prd->slug])}}">
                                            <img src="{{asset($rl_prd->image)}}" alt="{{$rl_prd->name}}"
                                                 class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <p class="name">
                                            <a href="{{route('xuongmoc.chitietsanpham',['slug'=>$rl_prd->slug])}}"
                                               title="{{$rl_prd->name}}">
                                                {{Str::limit($rl_prd->name,20,'...')}}
                                            </a>
                                        </p>
                                        <p class="vote">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                        </p>
                                        <p class="desc">{{$rl_prd->description}}</p>

                                        <p class="price"><span>{{number_format($rl_prd->price)}}</span> VNĐ </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('detail_js')
    <!-- jQuery -->
    <script src="/frontend/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/frontend/js//bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/frontend/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/frontend/js/demo.js"></script>
@endsection
