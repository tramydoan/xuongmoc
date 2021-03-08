<header class="">
    <nav class="container">
        <div class="logo">
            <a href="/"><img src="/frontend/images/AnhCat/logo.png" alt="Xưởng mộc giá tốt hoàng hoan"></a>
        </div>
        <div class="menu" data-show="0">
            <div class="d-flex h-100 justify-content-center align-items-center">
                <ul>
                    <li class="{{$currentPage == 'home' ? 'active' : ''}}"><a href="/"> Trang chủ </a></li>
                    <li class="{{$currentPage == 'abt' ? 'active' : ''}}"><a href="{{route('xuongmoc.about')}}"> Giới thiệu </a></li>
                    <li class="{{$currentPage == 'prd' ? 'active' : ''}}"><a href="{{route('xuongmoc.product')}}"> Sản phẩm </a></li>
                    <li class="{{$currentPage == 'art' ? 'active' : ''}}"><a href="{{route('xuongmoc.article')}}"> Tin tức </a></li>
                    <li class="{{$currentPage == 'vd' ? 'active' : ''}}"><a href="{{route('xuongmoc.vendor')}}"> Đối tác  </a></li>
{{--                    <li class="{{$currentPage == 'ct' ? 'active' : ''}}"><a href="{{route('xuongmoc.contact')}}"> Liên hệ  </a></li>--}}
                    <li>
                        <a href="{{route('xuongmoc.myProfile')}}"><i class="fas fa-user-circle mr-2 {{$currentPage == 'login' ? ' ' : ''}}"></i></a>
                        <a class="search-menu" data-toggle="search-form"><i class="fas fa-search mr-2 {{$currentPage == 'search' ? ' ' : ''}}"></i></a>
                        <a  class="cart-menu" data-toggle="cart-form" ><i class="fas fa-shopping-cart mr-1 {{$currentPage == 'cart' ? ' ' : ''}}"></i></a>
{{--                        <a class="cart-menu" data-toggle="cart-form" ><i class="fas fa-shopping-cart mr-1 {{$currentPage == 'cart' ? ' ' : ''}}"></i>[<span class="total-cart">0</span>]</a>--}}
                    </li>
                </ul>
            </div>

        </div>
        <div class="d-flex align-items-center d-block d-lg-none">
            <button class="res-menu d-block d-lg-none">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

    </nav>
</header>
