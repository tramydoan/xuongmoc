@extends('Frontend.layout.main')
@section('style')
    <title>Giỏ hàng của bạn - Xưởng Mộc Hoàng Hoan</title>
@endsection
{{--@section('detail_js')--}}
{{--    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}
{{--@endsection--}}
@section('content')
    <!-- BANNER -->
    <div class="banner-abt-wrap">
        <div class="img">
            <img src="/frontend/images/AnhCat/banner-gio-hang.png" alt="Mua hàng tại xưởng mộc giá tốt" class="w-100">
        </div>
        <div class="banner-content d-flex justify-content-center align-items-center w-100 h-100">
            <h1 class="text-center">Giỏ hàng của bạn</h1>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container">
        <div class="row">
            <div class="breadcumb" style="padding: 30px 0">
                <div class="d-flex align-items-center">
                    <p><a href="{{route('xuongmoc')}}">Trang chủ </a></p>
                    <span> <i class="fas fa-angle-right"></i> </span>
                    <p><a href="{{route('xuongmoc.cart')}}">Giỏ hàng của bạn</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container cart-wrap">
        @if(count($cart) > 0)
            <div class="row">
                <div class="table-responsive">
                    <table class="table cart-table">
                        <thead class="cart-thead">
                        <tr class="text-center">
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $item)
                            <tr class="text-center cart-item">
                                <td class="remove">
                                    <div>
                                        <a data-url="{{route('xuongmoc.del-cart', ['id'=>$item->rowId])}}" type="button"
                                           class="delete-cart">
                                            x
                                        </a>
                                    </div>
                                </td>
                                <td class="cart-img-prd">
                                    <div class="img">
                                        <a href="{{route('xuongmoc.chitietsanpham', ['slug'=>$item->options['slug']])}}"><img
                                                src="{{asset($item->options['image'])}}" alt="" class="w-100"></a>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <h3>
                                        <a href="{{route('xuongmoc.chitietsanpham', ['slug'=>$item->options['slug']])}}">{{$item->name}}</a>
                                    </h3>
                                    <p>chất liệu ở đây</p>
                                </td>
                                <td class="price">{{number_format($item->price)}} VNĐ</td>
                                <input type="hidden" class="price2" value="{{$item->price}}">
                                <td class="quantity">
                                    <div class="input-group mb-3">
                                        <input data-url="{{route('xuongmoc.sub-cart', ['id'=>$item->rowId])}}"
                                               type="button"
                                               class="qty-btn qtyminus" value="-">
                                        <input type="number" name="quantity" class="quantity form-control qty-product"
                                               value="{{$item->qty}}" min="1"
                                               max="10" autocomplete="off" disabled>
                                        <input data-url="{{route('xuongmoc.add-cart', ['id'=>$item->id])}}"
                                               type="button"
                                               class="qty-btn qtyplus" value="+">
                                    </div>
                                </td>
                                <td class="total">{{number_format($item->price * $item->qty)}} VNĐ</td>
                                <input type="hidden" value="{{$item->price * $item->qty}} " class="total2">
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{--                <div class="check-out-wrap d-flex">--}}
                    <div class="checkout-ft col-md-6 col-sm-12 pl-0 pr-sm-0 float-lg-left pb-4">
                        <div class="checkout-note clearfix">
                            <textarea id="note" name="note" rows="8" cols="50" placeholder="Ghi chú"></textarea>
                        </div>
                    </div>
                    <div class="checkout-ft col-md-6 col-sm-12 text-right pr-0 pl-sm-0 float-lg-right pb-4">
                        <p class="order-infor">
                            Tổng tiền:
                            <span class="total_price"></span> VNĐ
                        </p>
                        <div class="cart-buttons">
                            <a class="button dark link-continue hvr-sweep-to-right" href="{{route('xuongmoc.product')}}"
                               title="Tiếp tục mua hàng"><i
                                    class="fa fa-reply"></i>
                                Tiếp tục mua hàng
                            </a>
                            <a href="{{route('xuongmoc.checkout')}}" style="padding: 0">
                                <button type="submit" id="checkout" class="btn-checkout button dark hvr-sweep-to-right"
                                        name="checkout"
                                        value="">
                                    Thanh toán
                                </button>
                            </a>
                        </div>
                    </div>
                    {{--                </div>--}}
                </div>
            </div>
        @else
            <div class="col-md-12 col-xs-12 heading-page text-center">
                <div class="header-page">
                    <h1>Giỏ hàng của bạn</h1>
                    <p class="count-cart">Có <span>0 sản phẩm</span> trong giỏ hàng</p>
                </div>
            </div>
            <div class="text-center pb-5">
                <p class="p-4">Giỏ hàng của bạn đang trống</p>
                <div class="cart-buttons">
                    <a class="button dark link-continue hvr-sweep-to-right" href="{{route('xuongmoc.product')}}"
                       title="Tiếp tục mua hàng"><i
                            class="fa fa-reply"></i>
                        Tiếp tục mua hàng
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
