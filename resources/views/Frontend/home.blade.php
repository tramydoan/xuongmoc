@extends('Frontend.layout.main')
@section('style')
    <title>Xưởng Mộc Hoàng Hoan - Thế Giới Nội Thất Số 1 Việt Nam</title>
@endsection
@section('detail_js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if(Session::get('success') != null)
        <script>
            Swal.fire(
                'Thành công!',
                "{{Session::get('success')}}",
                'success',
            )
        </script>
    @endif
@endsection
@section('content')
    <!-- BANNER -->
    <div class="banner">
        <div class="banner-home">
            @foreach($banner as $item)
                @if($item->is_page == 0)
                    <div class="banner-home-item">
                        <img src="{{asset($item->image)}}" class="d-block w-100" alt="banner">
                        <div class="content-box-banner">
                            <h2 class="text-uppercase header-banner">
                                {!! $item->title !!}
                            </h2>
                            <div class="sapo-banner">
                                {!! $item->content !!}
                            </div>
                            <a href="{{route('xuongmoc.contact')}}" class="text-uppercase btn-banner"> Liên hệ ngay </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="content-wrap container">
        <div class="categories">
            @foreach($category as $cate)
                <div class="category-item">

                    <a href="{{route('xuongmoc.danhmuc' , ['slug' => $cate->slug])}}">
                        <div class="category-img">
                            <img src="{{asset($cate->image)}}" alt="{{$cate->name}}" class="img-cate">
                        </div>
                        <p>{!! $cate->name !!}</p>
                    </a>
                </div>
            @endforeach

        </div>

        <!-- HOT PRODUCT -->
        <div class="hot-product-wrap">
            <h2 class="header-prd"> Sản phẩm nổi bật </h2>

            <div class="slide-prd">
                @foreach($product as $prd)
                    <div class="product">
                        <div class="img">
                            <a href="{{route('xuongmoc.chitietsanpham',['slug'=>$prd->slug])}}">
                                <img src="{{asset($prd->image)}}" alt="{{$prd->name}}" class="img-fluid">
                            </a>
                        </div>
                        <div class="info">
                            <p class="name">
                                <a href="{{route('xuongmoc.chitietsanpham',['slug'=>$prd->slug])}}">{{Str::limit($prd->name,20,'...')}}</a>
                            </p>
                            <p class="vote">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </p>
                            <p class="desc">{{$prd->description}}</p>

                            <p class="price">
								<span>
									{{number_format($prd->price)}}
								</span> VNĐ
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ABOUT US -->
    <div class="about-us">
        <div class="container">
            <h2 class="header-abt"> Về chúng tôi </h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="img h-100">
                        <img src="/frontend/images/AnhCat/tintuc-0.png"
                             alt="NỘI THẤT HOÀNG HOAN UY TÍN SONG HÀNH CHẤT LƯỢNG" class="w-100 h-100">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content h-100">
                        <h3> NỘI THẤT HOÀNG HOAN UY TÍN SONG HÀNH CHẤT LƯỢNG </h3>
                        <div>
                            <p>Nội thất Hoàng Hoan chúng tôi tự hào là đứa con tinh thần ra đời sau hơn 30 năm hoạt động
                                trong lĩnh vực kinh doanh đồ gỗ nội thất với thương hiệu ĐỒ GỖ HOÀNG HOAN nổi tiếng.</p>

                            <p>Tài nguyên của chúng tôi là đội ngũ kiến trúc sư tốt nghiệp ĐH Kiến Trúc Hà Nội với nhiều
                                năm kinh nghiệm, luôn tràn đầy nhiệt huyết và sức sáng tạo của tuổi trẻ. Thế mạnh của
                                chúng tôi là sở hữu xưởng nội thất hơn 10.000m2 tại Hà Nội sản xuất đa dạng các sản phẩm
                                với giá cả luôn cạnh tranh.</p>
                        </div>
                        <div>
                            <p style="margin: 0">
                                <img alt="giới thiệu" src="/frontend/images/AnhCat/tintuc-1.png">&nbsp;
                                <img alt="giới thiệu" src="/frontend/images/AnhCat/tintuc-2.png">&nbsp;
                                <img alt="giới thiệu" src="/frontend/images/AnhCat/tintuc-3.png">&nbsp;
                                <a href="{{route('xuongmoc.about')}}">
                                    <img alt="" src="/frontend/images/AnhCat/tintuc-4.png">
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <h2 class="header-abt"> Tại sao nên chọn hoàng hoan?</h2>
            <div class="row reason">
                <div class="col-md-6">
                    <div class="reason-index-item d-flex">
                        <div class="img">
                            <img src="/frontend/images/AnhCat/money.png" alt="lý do 1">
                        </div>
                        <div class="content">
                            <h3 class="title"> Chính sách giá </h3>
                            <p class="desc"> Tốt nhất và công khai giá trên website</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="reason-index-item d-flex">
                        <div class="img">
                            <img src="/frontend/images/AnhCat/product.png" alt="lý do 1">
                        </div>
                        <div class="content">
                            <h3 class="title"> Sản xuất </h3>
                            <p class="desc"> Trực tiếp sản xuất bởi đội ngũ nhân viên hàng đầu</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="reason-index-item d-flex">
                        <div class="img">
                            <img src="/frontend/images/AnhCat/medal.png" alt="lý do 1">
                        </div>
                        <div class="content">
                            <h3 class="title"> Chất lượng </h3>
                            <p class="desc"> Cam kết chất lượng sản phẩm và tốc độ thi công </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="reason-index-item d-flex">
                        <div class="img">
                            <img src="/frontend/images/AnhCat/open-24-h.png" alt="lý do 1">
                        </div>
                        <div class="content">
                            <h3 class="title"> Bảo hành </h3>
                            <p class="desc"> Dịch vụ bảo hành tốt nhất khu vực</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- NEWS -->
    <div class="news">
        <div class="container">
            <h2 class="header-news"> Tin tức </h2>
            <div class="row">
                <div class="col-lg-7">
                    @foreach($article as $art)
                        @if($art->position == 1)
                            <div class="box">
                                <div class="img">
                                    <a href="{{route('xuongmoc.chitiettintuc',['slug'=>$art->slug])}}">
                                        <img src="{{asset($art->image)}}" alt="{{$art->title}}" class="w-100">
                                    </a>
                                </div>
                                <div class="news-content">
                                    <p class="title">
                                        <a href="{{route('xuongmoc.chitiettintuc',['slug'=>$art->slug])}}">{{$art->title}}</a>
                                    </p>
                                    <div class="desc"><p>{!! $art->description !!}</p></div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="col-lg-5 ">
                    <ul>
                        @foreach($article as $art)
                            @if($art->position != 1)
                                <li class="d-flex">
                                    <div class="img">
                                        <a href="{{route('xuongmoc.chitiettintuc',['slug'=>$art->slug])}}">
                                            <img src="{{asset($art->image)}}" alt="{{$art->title}}">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="title">
                                            <a href="{{route('xuongmoc.chitiettintuc',['slug'=>$art->slug])}}">{{$art->title}}</a>
                                        </p>
                                        <div class="desc sub-news-content">{!! $art->description !!}</div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <div>
                        <a href="{{route('xuongmoc.article')}}" class="see-more"> Xem thêm <i
                                class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- PARTNER -->
    <div class="partner">
        <div class="container">
            <h2 class="header-ptn"> Đối tác </h2>

            <div class="slide-partner">
                @foreach($vendors as $vd)
                    <div class="ptn-item">
                        <div class="img">
                            <img src="{{asset($vd->image)}}" alt="{{$vd->name}}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- CONTACT -->
    <div class="contact contact-index">
        <span><img src="/frontend/images/AnhCat/ghe.png" alt="Trải nghiệm cùng hoàng hoan"></span>
        <div class="container">
            <div class="row contact-row align-items-center">
                <div class="col-lg-6 col-md-5 ">
                    <h2 class="title"> Trải nghiệm dịch vụ <br> <strong> cùng Hoàng hoan ngay </strong></h2>
                </div>
                <div class="col-lg-6 col-md-7">
                    <p class="mb-1 text-white"> Thông tin liên hệ </p>
                        <div class="form-group">
                            <input required class="infor" type="text" placeholder="Email/Số điện thoại" name="homeContact">
                            <button class="savePhone"> Gửi</button>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('detail_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.savePhone').on('click', async function () {
            if ($('.infor').val() == '') {
                swal({
                    icon: 'warning',
                    title: "Thông báo",
                    text: "Bạn chưa điền thông tin  :(",
                    dangerMode: true,
                })
            } else {
                swal({
                    icon: 'success',
                    title: "Thông báo",
                    text: "Cảm ơn bạn đã ghé shop! \n Xưởng sẽ liên lạc cho bạn với thời gian sớm nhất",
                    dangerMode: true,
                })

            }
        })
    </script>
@endsection
