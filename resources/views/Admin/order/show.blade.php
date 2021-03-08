@extends('Admin.layout.main')
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hóa đơn mua hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        p {
            text-align: justify;
        }

        .font-14 {
            font-size: 14px !important;
        }
    </style>
</head>

<body style="background: #dedede">
<section style="width: 794px; height: 100%; margin: 5% auto; font-size: 16px; background: #ffffff; padding: 50px;">
    <div class="nationalBrand" style="text-align: left; ">
        <div class="row">
            <div class="col-md-3">
                <img src="/frontend/images/AnhCat/logo.png" alt="">
            </div>
            <div class="col-md-9">
                <p style="margin-bottom: 0"><b>Cửa hàng nội thất uy tín Xưởng Mộc Hoàng Hoan</b></p>
                <p style="margin-bottom: 0">Địa chỉ: Lương Thế Vinh, Thanh Xuân Bắc, Hà Nội, Việt Nam</p>
                <p style="margin-bottom: 0">Điện thoại: 0333569399</p>
                <p style="margin-bottom: 0">Website: xuongmochoanghoan.com</p>
            </div>
        </div>
        <br/>
        <h2 style="text-align: center">HÓA ĐƠN BÁN HÀNG</h2>

        <p style="text-align: center">Mã phiếu: #{{ $order->id }}</p>
        <div class="content">
            <div class="row">
                <div class="col-md-3">
                    <p>
                        <b>Ngày mua hàng: </b>
                    </p>
                    <p>
                        <b>Khách hàng: </b>
                    </p>
                    <p>
                        <b>Số điện thoại: </b>
                    </p>
                    <p>
                        <b>Địa chỉ: </b>
                    </p>
                </div>
                <div class="col-md-9">
                    <p>{{date_format($order->created_at ,'d/m/Y H:i')}}</p>
                    <p>{!! $order->ship_name !!}</p>
                    <p>{!! $order->ship_phone !!}</p>
                    <p>{!! $order->ship_address !!}</p>
                </div>
            </div>
            <br/>
            <table class="table table-bordered" style="border: none">
                <tbody>
                <tr>
                    <th style="text-align: center">Tên sản phẩm</th>
                    <th style="text-align: center">Số lượng</th>
                    <th style="text-align: center">Đơn giá</th>
                    <th style="text-align: right">Thành tiền</th>
                </tr>
                @foreach ($orderDetails as $orderDetail)
                    <tr>
                        <td style="text-align: left">{{ $orderDetail['name'] }}</td>
                        <td style="text-align: center">{{ number_format($orderDetail['qty']) }}</td>
                        <td style="text-align: center">{{ number_format($orderDetail['price'], 0,",",".") }} VNĐ</td>
                        <td style="text-align: right">{{ number_format($orderDetail['total'], 0, ",", ".") }} VNĐ</td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="3" style="text-align: right; font-weight: 700; border: none">Tổng tiền:</th>
                    <td style="text-align: right;border: none">{{ number_format($order->total_price, 0,",",".") }}VNĐ
                    </td>
                </tr>
                <tr>
                    <th colspan="3" style="text-align: right; font-weight: 700; border: none">Chiết khấu:</th>
                    <td style="text-align: right; border: none">0</td>
                </tr>
                <tr>
                    <th colspan="3" style="text-align: right; font-weight: 700; border: none">Thanh toán:</th>
                    <td style="text-align: right; border: none">{{ number_format($order->total_price, 0,",",".") }}VNĐ
                    </td>
                </tr>
                </tbody>
            </table>
            <hr style="width: 60%; border-top: 2px solid #0c0c0c;"/>
            <p style="font-weight: 700; text-align: center">QUY TRÌNH BẢO HÀNH SẢN PHẨM</P>
            <p style="margin-bottom: 5px"><b>Bước 1: Khách hàng cung cấp thông tin</b></p>
            <p>Khách hàng vui lòng cung cấp thông tin chi tiết về lỗi (phải có hình ảnh đính kèm) về địa chỉ thư
                điện tử: tramydoan2109@gmail.com</p>
            <p style="margin-bottom: 5px"><b>Bước 2: Xưởng Mộc Hoàng Hoan tiếp nhận thông tin bảo hành</b></p>
            <p>Xưởng Mộc Hoàng Hoan sẽ phản hồi yêu cầu của quý khách hàng trong vòng 24 tiếng.</p>
            <p>Mọi yêu cầu cần xử lý gấp, vui lòng gọi đến số Hotline: +84 902 477 787</p>
            <p style="margin-bottom: 5px"><b>Bước 3: Tiếp nhận sản phẩm bảo hành</b></p>
            <p>Xưởng Mộc Hoàng Hoan sẽ cử nhân viên kỹ thuật đến tận nơi sẽ tiến hành kiểm tra lỗi và nhận sản phẩm bảo hành tại
                nhà của khách hàng.</p>
            <p style="margin-bottom: 5px"><b>Bước 4: Bảo hành sản phẩm</b></p>
            <p>Tùy thuộc vào mức độ hư hại hoặc lỗi của sản phẩm, Xưởng Mộc Hoàng Hoan sẽ thông báo thời gian chính xác cho việc
                sửa chữa/thay thế và hoàn trả sản phẩm lại cho khách hàng.</p>
            <b>Lưu ý: </b>
            <ul style="list-style: none">

                <li>- Nếu lỗi được xác định là lỗi của nhà sản xuất, Xưởng Mộc Hoàng Hoan sẽ chịu toàn bộ chi phí
                    sửa chữa, bảo hành và vận chuyển.
                </li>
                <li>- Nếu lỗi được xác định là lỗi của khách hàng, khách hàng sẽ chịu chi phí sửa chữa,
                    vận chuyển hoặc các chi phí phát sinh khác.
                </li>
            </ul>
            <table style="border-color: #0c0c0c" class="table">

                <tbody>
                <tr>
                    <td></td>
                    <td style="text-align: center"><span>Ngày ..... tháng ..... năm 20... </span></td>
                </tr>
                <tr>
                    <td style=" text-align: center; border: none;">
                        <span style="font-weight: bold">Khách hàng</span> <br>
                        <span style="text-align: center">(Ký, ghi rõ họ tên)</span>
                    </td>
                    <td style="text-align: center; border: none;">
                        <span style="font-weight: bold">Nhân viên bán hàng</span> <br>
                        <span style="text-align: center">(Ký, ghi rõ họ tên)</span>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; text-align: center; border: none;"></td>
                    <td style="font-weight: bold; text-align: center; border: none;"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
</body>
</html>
<script>
    window.print();
</script>
@endsection
