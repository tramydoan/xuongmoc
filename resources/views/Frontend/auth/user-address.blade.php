@extends('Frontend.layout.main')
@section('style')
    <title>Địa Chỉ - Xưởng Mộc Hoàng Hoan</title>
@endsection
@section('detail_js')
    <script>
        $('.action_edit').on('click', function (){
            $('.edit_address').css('display', 'block');
            $('#view_address').css('display', 'none');
        })
    </script>
@endsection
@section('content')
    <!-- CONTENT -->
    <div class="title-infor-account text-center">
        <h1>Thông tin địa chỉ</h1>
    </div>
    <div class="container pb-5">
        <div class="row">
            <div class="col-xs-12 col-sm-3 sidebar-account">
                <div class="AccountSidebar">
                    <h3 class="AccountTitle titleSidebar">Tài khoản</h3>
                    <div class="AccountList">
                        <ul class="list-unstyled">
                            <li><a href="{{route('xuongmoc.myProfile')}}"><i class="far fa-dot-circle"></i>Thông tin tài
                                    khoản</a>
                            </li>
                            <li><a href="{{route('xuongmoc.myAddress')}}"> <i class="far fa-dot-circle"></i>Danh sách
                                    địa chỉ</a></li>
                            <li><a href="{{route('xuongmoc.logout')}}"><i class="far fa-dot-circle"></i>Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-9">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="address-box">
                            <div class="row">
                                <div class="col-lg-12 col-xs-12">
                                    <div class=" address_title ">
                                        <h3>
                                            <strong>{{auth()->user()->name}}</strong>
                                        </h3>

                                        <p class="address_actions text-right">
                                                <span class="action_link action_edit">
                                                    <a href="#" onclick=""><i class="fa fa-pencil-square-o"></i></a>
                                                </span>
                                            <span class="action_link action_delete">
                                                    <a href="#" onclick=""><i class="fa fa-times"></i></a>
                                                </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="address_table">
                            <div id="view_address" class="customer_address">
                                <div class="row">
                                    <div class="col-md-6  col-sm-6 col-xs-6">
                                        <p><strong>{{auth()->user()->name}}</strong></p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <p>
                                            <b>Địa chỉ:</b>
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <p>{{auth()->user()->address}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <p>
                                            <b>Số điện thoại:</b>
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 ">
                                        <p>{{auth()->user()->phone}}</p>
                                    </div>
                                </div>
                            </div>

                            <div style="display: none" id="edit_address" class="customer_address edit_address">
                                <form accept-charset="UTF-8" action="{{route('xuongmoc.updateInfo')}}" id="address_form" method="post">
                                    @csrf
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                        <input type="text" id="address_first_name " class="form-control textbox" value="{{$user->name}}" name="name" size="40" placeholder="Tên">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-home"></i></span>
                                        <input type="text" for="address_company " class="form-control textbox" value="{{$user->address}}" name="address" size="40" placeholder="Địa chỉ">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-home"></i></span>
                                        <input type="text" id="address1 " class="form-control textbox" name="phone" size="40" value="{{$user->phone}}" placeholder="Số điện thoại">
                                    </div>
                                    <div class="action_bottom">
                                        <input class="btn bt-primary" type="submit" value="Cập nhật">
                                        <span class="">hoặc <a href="" onclick="">Hủy</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
@endsection
