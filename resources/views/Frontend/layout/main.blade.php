<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="/frontend/slick/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/frontend/slick/slick/slick-theme.css"/>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/frontend/css/global.css">
    <link rel="stylesheet" type="text/css" href="/frontend/css/style.css">
    <link rel="stylesheet" type="text/css" href="/frontend/css/responsive.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    @yield('style')
    <link rel="icon" href="/frontend/images/AnhCat/logo.png" type="image/png">
</head>
<body class="bgc">

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v9.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="100109491404271"
     theme_color="#bd945f"
     logged_in_greeting="Chat với nhân viên bán hàng! (10am-09pm)"
     logged_out_greeting="Chat với nhân viên bán hàng! (10am-09pm)">
</div>


<div id="main-content" class="wrap">
    @include('Frontend.layout.header')

    <div class="content-wrap">
        @yield('content')
    </div>

    @include('Frontend.layout.footer')
</div>

<div class="site-nav-wrap">
    {{--SEARCH NAV--}}
    <div id="search-nav" class="search-sidebar search-form-wrapper">
        <div id="site-search" class="site-nav-container search-form-open">
            <div class="site-nav-container-last">
                <p class="title">Tìm kiếm</p>
                <div class="search-box wpo-wrapper-search">
                    <form action="{{route('xuongmoc.search')}}" class="searchform">
                        <div class="wpo-search-inner">
                            <input required="" id="inputSearchAuto" name="key" maxlength="40" autocomplete="off"
                                   class="searchinput input-search search-input" type="text" size="20"
                                   placeholder="Tìm kiếm sản phẩm...">
                        </div>
                        <button type="submit" class="btn-search btn d-flex align-items-center justify-content-center"
                                id="search-header-btn" title="Tìm kiếm">
                            <i class="fas fa-search fa-lg d-flex align-items-center justify-content-center"></i>
                        </button>
                    </form>

                    <div class="resultsContent">
                        <div class="box-product"></div>

                        {{--                        <div class="resultsMore">--}}
                        {{--                            <a href="#">Xem thêm 201 sản phẩm</a>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <button id="site-close-handle-search" class="site-close-handle hvr-grow" aria-label="Đóng" title="Đóng">
            <span></span>
            <span></span>
        </button>
    </div>


    {{--CART NAV--}}
{{--    <div id="cart-nav" class="cart-sidebar cart-form-wrapper">--}}
{{--        <div id="site-cart" class="site-nav-container cart-form-open">--}}
{{--            <div class="site-nav-container-last">--}}
{{--                <p class="title">Giỏ hàng</p>--}}
{{--                <div class="cart-view">--}}
{{--                    <table id="cart-view">--}}
{{--                        <tbody>--}}
{{--                        @if(count($cart) > 0)--}}

{{--                            @foreach($cart as $item)--}}
{{--                                <tr class="item_2">--}}
{{--                                    <td class="img">--}}
{{--                                        <a href="{{route('xuongmoc.chitietsanpham',['slug'=>$item->options['slug']])}}">--}}
{{--                                            <img src="{{$item->options['image']}}" alt="">--}}
{{--                                        </a>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div>--}}
{{--                                            <a class="pro-title-view" href="{{route('xuongmoc.chitietsanpham',['slug'=>$item->options['slug']])}}">{{$item->name}}</a>--}}
{{--                                            <span class="remove_link remove-cart">--}}
{{--                                        <a href=""><i class="fa fa-times"></i></a>--}}
{{--                                    </span>--}}
{{--                                        </div>--}}
{{--                                        <span class="materials">Gỗ lim</span>--}}
{{--                                        <div>--}}
{{--                                            <span class="pro-quantity-view">{{$item->qty}}</span>--}}
{{--                                            <span class="pro-price-view">{{number_format($item->price)}}vnđ</span>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                        @else--}}
{{--                            <p>Hiện chưa có sản phẩm</p>--}}
{{--                        @endif--}}
{{--                        </tbody>--}}
{{--                    </table>--}}

{{--                    <span class="line"></span>--}}

{{--                    <table class="table-total">--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <td class="text-left">TỔNG TIỀN:</td>--}}
{{--                            <td class="text-right" id="total-view-cart">{{$total}}vnđ</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td><a href="{{route('xuongmoc.cart')}}" class="linktocart button dark hvr-sweep-to-right">Xem--}}
{{--                                    giỏ hàng</a></td>--}}
{{--                            <td><a href="{{route('xuongmoc.checkout')}}"--}}
{{--                                   class="linktocheckout button dark hvr-sweep-to-right">Thanh toán</a></td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <button id="site-close-handle-cart" class="site-close-handle hvr-grow" aria-label="Đóng" title="Đóng">--}}
{{--            <span></span>--}}
{{--            <span></span>--}}
{{--        </button>--}}
{{--    </div>--}}
</div>
{{--BACK TO TOP--}}
<div class="back-to-top">
    <a>
        <div class="btt-back">
            <span class="btt-label-back">back to top</span>
            <span class="btt-icon-back"><i class="fa fa-long-arrow-up"></i></span>
        </div>
    </a>
</div>

{{--SITE OVERLAY OF NAV HEADER--}}
<div id="site-overlay1" class="site-overlay"></div>
{{--SITE OVERLAY OF NAV HEADER--}}
<div id="site-overlay2" class="site-overlay"></div>
</body>


<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/bf61fecb7c.js" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<!-- JQuery -->
<script type="text/javascript" src="/frontend/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/frontend/js/jquery-migrate-1.2.1.min.js"></script>
<!-- Slick -->
<script type="text/javascript" src="/frontend/slick/slick/slick.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

<!-- Script -->
<script type="text/javascript" src="/frontend/js/javascript.js"></script>

@yield('detail_js')
</html>
