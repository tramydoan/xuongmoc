@extends('Frontend.layout.main')
@section('style')
    <title>Đăng nhập</title>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-xs-12 wrapbox-account wrapbox-heading-account">
            <div class="header-page">
                <h1>Đăng nhập</h1>
            </div>
        </div>

        <div class="col-md-6 col-xs-12 wrapbox-account wrapbox-content-account">
            @if(session('thongbao'))
                {{session('thongbao')}}
            @endif
            <form method="post" action="{{route('xuongmoc.postLogin')}}" class="user-box login-box">
                @csrf
                <div class="user-input mt-3">
                    <input required="" type="email" value="" name="user-email" id="user-email"
                           placeholder="Email">
                    @error('user-email')
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
                        <button class="btn-login button dark hvr-sweep-to-right" type="submit">Đăng nhập</button>
                    </div>
                    <div class="link-login">
                        <a href="#">Quên mật khẩu?</a><br>
                        hoặc <a href="{{route('xuongmoc.register')}}" title="Đăng ký">Đăng ký</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
