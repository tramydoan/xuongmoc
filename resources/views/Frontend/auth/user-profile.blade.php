@extends('Frontend.layout.main')
@section('style')
    <title>Tài khoản của bạn</title>
@endsection
@section('content')
<!-- CONTENT -->
<div class="title-infor-account text-center">
    <h1>Tài khoản của bạn </h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-3 sidebar-account">
            <div class="AccountSidebar">
                <h3 class="AccountTitle titleSidebar">Tài khoản</h3>
                <div class="AccountList">
                    <ul class="list-unstyled">
                        <li><a href="{{route('xuongmoc.myProfile')}}"><i class="far fa-dot-circle"></i>Thông tin tài khoản</a>
                        </li>
                        <li><a href="{{route('xuongmoc.myAddress')}}"> <i class="far fa-dot-circle"></i>Danh sách địa chỉ</a></li>
                        <li><a href="{{route('xuongmoc.logout')}}"><i class="far fa-dot-circle"></i>Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-9">
            <div class="row">
                <div class="col-xs-12" id="customer_sidebar">
                    <p class="title-detail">Thông tin tài khoản</p>

                    <h2 class="name_account">{{$user->name}}</h2>
                    <p class="email ">{{$user->email}}</p>
                    <div class="address ">

                        <p>{{$user->address}}</p>
                        <p>{{$user->phone ?? 'Trống'}}</p>

                        <a id="view_address" href="{{route('xuongmoc.myAddress')}}">Xem địa chỉ</a>
                    </div>
                </div>

                <div class="col-xs-12 customer-table-wrap" id="customer_orders">
                    <div class="customer_order customer-table-bg">

                        <p class="title-detail">
                            Danh sách đơn hàng mới nhất
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="order_number text-center">Mã đơn hàng</th>
                                    <th class="date text-center">Ngày đặt</th>
                                    <th class="total text-center">Thành tiền</th>
                                    <th class="payment_status text-center">Phương thức thanh toán</th>
                                    <th class="fulfillment_status text-center">Vận chuyển</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($orders as $order)
                                <tr class="odd cancelled_order">
                                    <td class="text-center"><span>#{{$order->id}}</span></td>
                                    <td class="text-center"><span>{{$order->created_at}}</span></td>
                                    <td class="text-center"><span class="total money">{{number_format($order->total_price)}} VNĐ</span></td>
                                    <td class="text-center"><span class="status_not fulfilled">{{$order->payment_method}}</span></td>
                                    <td class="text-center"><span class="status_pending">{{$order->status == 0 ? 'Chưa giao' : ($order->status == 0 ? 'Đang giao' : 'Đã giao')}}</span></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
