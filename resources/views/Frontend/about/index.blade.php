@extends('Frontend.layout.main')
@section('style')
    <title>XƯỞNG MỘC UY TÍN SONG HÀNH CHẤT LƯỢNG</title>
@endsection
@section('content')
    <!-- BANNER -->
    <div class="banner-abt-wrap">
        <div class="img">
            <img src="/frontend/images/AnhCat/banner-gioi-thieu.png" alt="Giới thiệu về xưởng mộc giá tốt hoàng hoan">
        </div>
        <div class="banner-content d-flex justify-content-center align-items-center w-100 h-100">
            <h1 class="text-center">Giới thiệu</h1>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container">

        <div class="introduce">
            @foreach($about as $abt)
                @if($abt -> position == 1)
                    <div class="introduce-box">
                        <h2 class="header-introduce">{{$abt->title}}</h2>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="img mb-4">
                                    <img src="{{asset($abt->image)}}" alt="{{$abt->title}}" class="img-fluid w-100">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="content text-justify">{!! $abt->content !!}</div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="view-box px-0 px-md-4">
                        <h2 class="header-view">{{$abt->title}}</h2>
                        <div class="img">
                            <img src="{{asset($abt->image)}}" alt="{{$abt->title}}" class="w-100">
                        </div>
                        <div class="content text-justify mt-3">{!! $abt->content !!}</div>
                    </div>
                @endif
            @endforeach
            <div class="duty-box">
                <h2 class="header-duty"> sứ mệnh </h2>
                <div class="row reason">
                    <div class="col-lg-6">
                        <div class="reason-item d-flex">
                            <div class="img">
                                <img src="/frontend/images/AnhCat/voi-xa-hoi.png" alt="Với xã hội">
                            </div>
                            <div class="content">
                                <h3 class="title"> Với xã hội </h3>
                                <p class="desc">
                                </p>
                                <p>Hài hòa lợi ích doanh nghiệp với lợi ích xã hội, tích cực cùng cộng đồng xây dựng
                                    môi trường sống bền vững.</p>

                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="reason-item d-flex">
                            <div class="img">
                                <img src="/frontend/images/AnhCat/voi-nhan-vien.jpg" alt="Với nhân viên">
                            </div>
                            <div class="content">
                                <h3 class="title"> Với nhân viên </h3>
                                <p class="desc">
                                </p>
                                <p>Xây dựng môi trường làm việc chuyên nghiệp, năng động, sáng tạo và nhân văn.</p>

                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="reason-item d-flex">
                            <div class="img">
                                <img src="/frontend/images/AnhCat/voi-doi-tac.jpg" alt="Với đối tác">
                            </div>
                            <div class="content">
                                <h3 class="title"> Với đối tác </h3>
                                <p class="desc">
                                </p>
                                <p>Xây dựng môi trường làm việc chuyên nghiệp, năng động, sáng tạo và nhân văn.</p>

                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="reason-item d-flex">
                            <div class="img">
                                <img src="/frontend/images/AnhCat/voi-thi-truong.png" alt="Với thị trường">
                            </div>
                            <div class="content">
                                <h3 class="title"> Với thị trường </h3>
                                <p class="desc">
                                </p>
                                <p>Cung cấp các sản phẩm với chất lượng quốc tế và phù hợp với con người Việt
                                    Nam.</p>

                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
