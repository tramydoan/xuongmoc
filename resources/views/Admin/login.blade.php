<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<style>
    .sidenav {
        height: 100%;
        background-color: #c49f6b;
        padding: 43% 0;
    }

    .login-main-text {
        padding: 0 60px;
        color: #fff;
    }

    .login-form {
        width: 60%;
    }

    .btn-black {
        background-color: #2c2e53 !important;
        color: #fff;
    }

    label {
        color: #2c2e53;
        font-weight: 700;
    }
    .login-form {
        color: #2c2e53;
    }
</style>
<body>
<div class="container-fluid pl-0">
    <div class="row">
        <div class="col-md-6 no-float">
            <div class="sidenav">
                <div class="login-main-text">
                    <h2>Quản Lý Xưởng Mộc<br>Đăng Nhập</h2>
                    <p>Đăng nhập để vào trang Quản trị</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 no-float">
            <div class="main d-flex align-items-center h-100">
                <div class="login-form">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            {{$error}}<br>
                        @endforeach
                    @endif
                    @if(session('thongbao'))
                        {{session('thongbao')}}
                    @endif
                    <form action="{{route('admin.show_dashboard')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input required name="email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input required name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-black">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>
