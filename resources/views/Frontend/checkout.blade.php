@extends('Frontend.layout.main')
@section('style')
    <title>Thanh toán đơn hàng - Xưởng Mộc Hoàng Hoan</title>
@endsection
@section('detail_js')
    <script>
        $('#form-checkout').submit(function (e) {
            if ($('.shipname').val() == '' || $('.email').val() == '' || $('.phone').val() == '' || $('.address').val() == '') {
                alert('Xin vui lòng nhập đầy đủ thông tin giao hàng.');
                e.preventDefault();
            }
        })
    </script>
@endsection
@section('content')
    <!-- BANNER -->
    <div class="banner-abt-wrap">
        <div class="img">
            <img src="/frontend/images/AnhCat/banner-lien-he.png" alt="Mua hàng tại xưởng mộc giá tốt" class="w-100">
        </div>
        <div class="banner-content d-flex justify-content-center align-items-center w-100 h-100">
            <h1 class="text-center">Thanh toán</h1>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container">
        <div class="checkout row">
            <form id="form-checkout" method="post" action="{{route('xuongmoc.postCheckout')}}"
                  class="checkout-content checkout-left-content col-lg-7 ">
                @csrf
                <div class="checkout-header">
                    <h2 class="checkout-title">Thông tin giao hàng</h2>
                </div>

                <div class="customer-information checkout-section">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <p style="padding: 10px 0; color: #757575">{{auth()->user()->name}} ({{auth()->user()->email}})
                            <br> <a href="{{route('xuongmoc.logout')}}"> Đăng xuất </a></p>
                    @else
                        <p>Bạn đã có tài khoản? <a href="{{route('xuongmoc.login')}}"> Đăng nhập </a></p>
                    @endif

                    <div class="fieldset">
                        <div class="field-wrap col-12 px-0">
                            <input class="field-input w-100 shipname" type="text" value="{{auth()->user()->name ?? ''}}"
                                   placeholder="Họ và tên" id="name"
                                   name="name"/>

                            <!-- The label -->
                            <label class="field-label" for="name">Họ và tên</label>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="field-wrap col-md-8 px-0">
                                    <!-- The input -->
                                    <input class="field-input w-100 email" type="email"
                                           value="{{auth()->user()->email ?? ''}}" placeholder="Email" id="email"
                                           name="email"/>
                                    <!-- The label -->
                                    <label class="field-label" for="email">Email</label>
                                </div>

                                <div class="field-wrap col-md-4 pr-0">
                                    <!-- The input -->
                                    <input class="field-input w-100 phone" value="{{auth()->user()->phone ?? ''}}"
                                           type="tel"
                                           maxlength="11"
                                           placeholder="Số điện thoại" id="phone" name="phone"/>
                                    <!-- The label -->
                                    <label class="field-label" for="phone">Số điện thoại</label>
                                </div>
                            </div>
                        </div>
                        <div class="field-wrap col-12 px-0">
                            <!-- The input -->
                            <input class="field-input w-100 address" value="{{auth()->user()->address ?? ''}}"
                                   type="text"
                                   placeholder="Địa chỉ" id="address"
                                   name="address"/>

                            <!-- The label -->
                            <label class="field-label" for="address">Địa chỉ</label>
                        </div>
                        <input type="hidden" name="total" value="{{$total}}">

                        {{--                        <div class="container">--}}
                        {{--                            <div class="row">--}}
                        {{--                                <div class="field-wrap field-select-wrap col-md-4 px-0">--}}
                        {{--                                    <!-- The input -->--}}
                        {{--                                    <select class="field-select w-100" id="province" name="province">--}}
                        {{--                                        <option value="null">Chọn tỉnh/thành</option>--}}
                        {{--                                    </select>--}}

                        {{--                                    <!-- The label -->--}}
                        {{--                                    <label class="field-label" for="province">Tỉnh / thành</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="field-wrap field-select-wrap col-md-4 pr-0">--}}
                        {{--                                    <!-- The input -->--}}
                        {{--                                    <select class="field-select w-100" id="district" name="district">--}}
                        {{--                                        <option value="null">Chọn quận/huyện</option>--}}
                        {{--                                    </select>--}}

                        {{--                                    <!-- The label -->--}}
                        {{--                                    <label class="field-label" for="district">Quận / huyện</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="field-wrap field-select-wrap col-md-4 pr-0">--}}
                        {{--                                    <!-- The input -->--}}
                        {{--                                    <select class="field-select w-100" id="ward" name="ward">--}}
                        {{--                                        <option value="null">Chọn phường/xã</option>--}}
                        {{--                                    </select>--}}

                        {{--                                    <!-- The label -->--}}
                        {{--                                    <label class="field-label" for="ward">Phường / xã</label>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>

                {{--                <div class="shipping-method checkout-section">--}}
                {{--                    <div class="checkout-header">--}}
                {{--                        <h2 class="checkout-title">Phương thức vận chuyển</h2>--}}
                {{--                    </div>--}}
                {{--                    <div class="shipping-method-content">--}}

                {{--                        <div class="content-box  blank-slate">--}}
                {{--                            <i class="blank-slate-icon icon icon-closed-box "></i>--}}
                {{--                            <p class="mt-0">Vui lòng chọn quận / huyện để có danh sách phương thức vận chuyển.</p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                {{--                </div>--}}

                <div class="payment-method checkout-section">
                    <div class="checkout-header">
                        <h2 class="checkout-title">Phương thức thanh toán</h2>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <div data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                     aria-controls="collapseOne"
                                     class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="payment-method1" name="payment_method"
                                           class="custom-control-input" checked="checked" value="Chuyển khoản">
                                    <label class="custom-control-label" for="payment-method1">Chuyển khoản Vietcombank
                                        (Yêu thích)</label>
                                </div>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                 data-parent="#accordionExample">
                                <div class="card-body blank-slate">
                                    Vietcombank chi nhánh Hà Nội
                                    Vui lòng ghi rõ tên và số điện thoại nhé!

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <div data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                     aria-controls="collapseTwo"
                                     class="custom-control custom-radio custom-control-inline collapsed">
                                    <input type="radio" id="payment-method2" name="payment_method"
                                           class="custom-control-input" value="Momo">
                                    <label class="custom-control-label" for="payment-method2">Thanh toán qua ví
                                        Momo</label>
                                </div>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                 data-parent="#accordionExample">
                                <div class="card-body blank-slate">
                                    0333569399 Đoàn Trà My
                                    Vui lòng ghi rõ tên và số điện thoại nhé!

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <div data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                     aria-controls="collapseThree"
                                     class="custom-control custom-radio custom-control-inline collapsed">
                                    <input type="radio" id="payment-method3" name="payment_method"
                                           class="custom-control-input" value="COD">
                                    <label class="custom-control-label" for="payment-method3">Thanh toán khi nhận
                                        hàng</label>
                                </div>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                 data-parent="#accordionExample">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="checkout-footer d-flex align-items-center justify-content-between">
                    <a class="previous-link" href="{{route('xuongmoc.cart')}}"><i class="fas fa-chevron-left mr-2"></i>Giỏ
                        hàng</a>
                    <button name="button" type="submit" class="continue-btn btn hvr-back-pulse">Hoàn tất đơn hàng
                    </button>
                </div>

            </form>
            <div class="checkout-content checkout-right-content col-lg-5">
                <div class="order-section">
                    <div class="order-prd-list order-content">
                        <table class="product-table">
                            <tbody>
                            @foreach($cart as $item)
                                <tr class="order-product">
                                    <td class="product-image">
                                        <div class="product-thumbnail">
                                            <div class="product-thumbnail-wrapper">
                                                <img class="product-thumbnail-image" src="{{$item->options['image']}}">
                                            </div>
                                            <span class="product-thumbnail-quantity">{{$item->qty}}</span>
                                        </div>
                                    </td>
                                    <td class="product-infor">
                                        <span class="product-name order-prd-list-txt">{{$item->name}}</span>

                                        <span class="product-description order-small-txt">
                                            50*70cm
                                        </span>

                                    </td>
                                    <td class="product-price">
                                        <span class="order-prd-list-txt">{{number_format($item->price)}}vnđ</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="order-discount order-content">
                        <div class="fieldset">
                            <div class="field-wrap discount-content d-flex justify-content-between align-items-center">
                                <div class="discount-input-wrap">
                                    <input placeholder="Mã giảm giá" class="field-input" autocomplete="off"
                                           autocapitalize="off" spellcheck="false" size="30" type="text" id="discount"
                                           name="discount" value="">
                                    <label class="field-label" for="discount">Mã giảm giá</label>
                                </div>
                                <button type="submit" class="discount-btn btn btn-default hvr-back-pulse">
                                    <span class="btn-content">Sử dụng</span>
                                </button>
                            </div>

                        </div>
                    </div>

                    <div class="order-total order-content">
                        <table class="checkout-total-table w-100">
                            <tbody>
                            <tr class="total total-subtotal">
                                <td class="total-name">Tạm tính</td>
                                <td class="total-price">
                                        <span class="order-summary-emphasis">
                                            {{$total}}vnđ
                                        </span>
                                </td>
                            </tr>

                            <tr class="total total-shipping">
                                <td class="total-name">Mã giảm giá</td>
                                <td class="total-price">
                                    <span class="order-summary-emphasis">—</span>
                                </td>
                            </tr>

                            </tbody>
                            <tfoot class="checkout-total-table-footer">
                            <tr class="total">
                                <td class="total-name payment-due-label">
                                    <span class="payment-due-label-total">Tổng cộng</span>
                                </td>
                                <td class="total-name payment-due">
                                    <span class="payment-due-currency">VND</span>
                                    <span class="payment-due-price">{{$total}}</span>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
