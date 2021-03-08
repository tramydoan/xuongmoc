@extends('Admin.layout.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Thông Tin Tài Khoản</h1>
                    <a href="{{route('quan-tri.user.index')}}">
                        <button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="col-md-6 m-auto py-2">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                @if($show->role != 2)
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{asset($show -> image)}}"
                         alt="User profile picture">
                </div>
                @endif
                <h3 class="profile-username text-center">{{$show -> name}}</h3>

                <p class="text-muted text-center">
                    @switch($show->role)
                        @case(0)
                        {{'Nhân viên'}}
                        @break
                        @case(1)
                        {{'Quản lý'}}
                        @break
                        @case(2)
                        {{'Khách hàng'}}
                        @break
                    @endswitch
                </p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Ngày sinh:</b> <a class="ml-2">{{$show -> date}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Email:</b> <a class="ml-2">{{$show -> email}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Số Điện Thoại:</b> <a class="ml-2">{{$show -> phone}}</a>
                    </li>
                    <li class="list-group-item" style="border-bottom: 0;">
                        <b>Địa Chỉ:</b> <a class="ml-2">{{$show -> address}}</a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
