@extends('Frontend.layout.main')
@section('style')
    <title>Đăng ký</title>
@endsection
@section('content')
<!-- CONTENT -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-xs-12 wrapbox-account wrapbox-heading-account">
            <div class="header-page">
                <h1>Tạo tài khoản</h1>
            </div>
        </div>

        <div class="col-md-6 col-xs-12 wrapbox-account wrapbox-content-account">
            <form method="post" action="{{route('xuongmoc.postRegister')}}" class="user-box">
                @csrf
                <div class="user-input">
                    <input required="" type="text" value="{{old('user-name')}}" name="user-name" placeholder="Họ và tên"
                           id="user-name" size="30">
                    @error('user-name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="user-input">
                    <input required="" type="text" value="{{old('user-address')}}" name="user-address" id="user-address"
                           placeholder="Địa chỉ">
                    @error('user-address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="user-input">
                    <input required="" type="text" value="{{old('user-phone')}}" name="user-phone" id="user-phone"
                           placeholder="Số điện thoại">
                    @error('user-phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="user-input">
                    <input required="" type="email" value="{{old('email')}}" name="email" id="user-email"
                           placeholder="Email">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="user-input">
                    <input required="" type="password" value="" name="user-password" id="user-password"
                           placeholder="Mật khẩu" size="16">
                    @error('user-password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="user-action">
                    <div class="login-btn-wrap">
                        <button class="btn-login hvr-sweep-to-right button dark" type="submit">Đăng ký</button>
                    </div>

                    <a href="/" class="come-back"><i class="fas fa-long-arrow-alt-left mr-4"></i> Quay lại trang
                        chủ</a>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
