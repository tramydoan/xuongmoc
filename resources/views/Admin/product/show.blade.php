@extends('Admin.layout.main')
@section('content')
    <style>
        span {font-weight: 700;margin-right: 7px;}
        .prd-detail > * {padding: .4em 0;}
        .tab-content {padding: 1.25em;}
    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Thông Tin Sản Phẩm</h1>
                    <a href="{{route('quan-tri.product.index')}}">
                        <button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body col-12 ">
                <div class="d-flex justify-content-between align-content-center">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img src="{{asset($show->image)}}" class="product-image" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            @foreach ($show->product_Images as $image)
                            <div class="product-image-thumb"><img src="{{asset($image->image ?? 'không có')}}" alt="Product Image"></div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 prd-detail">
                        <div>
                            <span>Tên Sản Phẩm:</span> {{$show->name}}
                        </div>
                        <div>
                            <span>Số Lượng:</span> {{$show->stock}}
                        </div>
                        <div>
                            <span>Giá Gốc:</span> {{number_format($show->cost)}} VNĐ
                        </div>
                        <div>
                            <span>Giá Bán:</span> {{number_format($show->price)}} VNĐ
                        </div>
                        <div>
                            <span>Giá Sale:</span> {{number_format($show->sale)}} VNĐ
                        </div>
                        <div>
                            <span>Danh Mục Cha:</span>{{$show->categories->name ?? 'Trống'}}
                        </div>
                        <div>
                            <span>Chất Liệu:</span>
                            @foreach($show->prd as $item)
                            {{$item->name ?? 'Trống'}},
                            @endforeach
                        </div>
                        <div>
                            <span>Vị Trí:</span> {{$show->position}}
                        </div>
                        <div>
                            <span>Trạng Thái:</span> {{ ($show->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}
                        </div>
                        <div>
                            <span>Nổi Bật:</span> {{ ($show->is_hot == 1) ? 'Nổi Bật' : 'Không' }}
                        </div>
                    </div>
                </div>
                <div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="featured-tab" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="true">Đặc Trưng</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="des-tab" data-toggle="tab" href="#specifications" role="tab" aria-controls="specifications" aria-selected="false">Thông Số</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="metaTitle-tab" data-toggle="tab" href="#preservation" role="tab" aria-controls="preservation" aria-selected="false">Bảo Quản</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="metaDes-tab" data-toggle="tab" href="#guarantee" role="tab" aria-controls="guarantee" aria-selected="false">Bảo Hành</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="metaDes-tab" data-toggle="tab" href="#commitment" role="tab" aria-controls="commitment" aria-selected="false">Cam Kết</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">{!! $show->featured !!}</div>
                        <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">{!! $show->specifications !!}</div>
                        <div class="tab-pane fade" id="preservation" role="tabpanel" aria-labelledby="preservation-tab">{!! $show->preservation !!}</div>
                        <div class="tab-pane fade" id="guarantee" role="tabpanel" aria-labelledby="guarantee-tab">{!! $show->guarantee !!}</div>
                        <div class="tab-pane fade" id="commitment" role="tabpanel" aria-labelledby="commitment-tab">{!! $show->commitment !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>





    </div>
@endsection
