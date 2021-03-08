@extends('Admin.layout.main')
@section('content')
    <style>
        .card-body > * {margin-bottom: 1em;}
        .card-danger .card-title {font-size: 1.5rem;}
        .card-danger .card-body {padding: .7em 1.25rem}
    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Thêm Mới Cài Đặt</h1>
                    <a href="{{route('quan-tri.setting.index')}}"><button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button></a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">

            @if($errors->any())
                <div class="card-danger">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-exclamation-triangle mr-2"></i>Lỗi!</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    @foreach($errors->all() as $error)
                        <div class="card-body bg-danger">{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <form role="form" action="{{route('quan-tri.setting.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input value="{{old('name')}}" type="text" class="form-control" id="name" name="name" placeholder="Nhập tên">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ">
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tạo</button>
                    <input type="reset" class="btn btn-default pull-right" style="padding: .5em 2em;" value="Reset">
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
