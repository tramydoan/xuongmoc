@extends('Admin.layout.main')
@section('content')
    <style>
        ul {list-style: none; padding: 0; margin: 0}
        ul li {padding: 0.3em 0}

    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Sửa Thông Tin Cài Đặt</h1>
                    <a href="{{route('quan-tri.setting.index')}}">
                        <button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content col-lg-12">
        <div class="card">


            <!-- form start -->
            <form role="form" action="{{route('quan-tri.setting.update',['id'=>$setting->id])}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{$setting->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                               value="{{$setting->email}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                               value="{{$setting->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address"
                               value="{{$setting->address}}">
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <input type="reset" class="btn btn-default pull-right" value="Reset">
                </div>
            </form>
        </div>
    </section>
@endsection
