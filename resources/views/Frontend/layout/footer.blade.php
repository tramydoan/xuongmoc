<!-- FOOTER -->
<footer class="w-100" style="background:#363636">
    <div class="container">
        <div class="row mt-3 mb-3">

            <div class="col-md-6">
                <h5>
                    THÔNG TIN CHUNG
                    <span class="line-remove" style="width: 78px; "></span>
                </h5>
                @foreach($setting as $item)
                <h4 class="mt-2 pt-2 com-name">{{$item->name}}</h4>
                <p class="com-phone">
                    <i class="fas fa-phone-alt"></i>
                    <a href="">{{$item->phone}}</a>
                </p>
                <p class="com-email">
                    <i class="fas fa-envelope"></i>
                    <a href="">{{$item->email}}</a>
                </p>
                <p class="com-address">
                    <i style="width: 22px;" class="fas fa-map-marker-alt"></i>
                    <a href="">{{$item->address}}</a>
                </p>
                @endforeach
            </div>
            <div class="col-md-3">
                <h5>
                    VỀ CHÚNG TÔI
                    <span class="line-remove" style="width: 78px; "></span>
                </h5>
                <ul>
                    <li><a href="{{route('xuongmoc.about')}}" title="Giới thiệu">Giới thiệu</a></li>
                    <li><a href="{{route('xuongmoc.product')}}" title="Sản phẩm">Sản phẩm</a></li>
                    <li><a href="{{route('xuongmoc.article')}}" title="Tin tức">Tin tức</a></li>
                    <li><a href="{{route('xuongmoc.vendor')}}" title="Đối tác">Đối tác</a></li>
                    <li><a href="{{route('xuongmoc.contact')}}" title="Liên hệ">Liên hệ</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>
                    KẾT NỐI VỚI CHÚNG TÔI
                    <span class="line-remove" style="width: 78px; "></span>
                </h5>
                <div class="mt-4 social-icon">
                    <a href="https://www.facebook.com/X%C6%B0%E1%BB%9Fng-M%E1%BB%99c-Ho%C3%A0ng-Hoan-110459754092742/" target="_blank">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    <a href="#" target="_blank">
                        <i class="fab fa-twitter-square"></i>
                    </a>
                    <a href="#" target="_blank">
                        <i class="far fa-envelope"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
