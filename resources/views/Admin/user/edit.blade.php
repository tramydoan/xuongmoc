@extends('Admin.layout.main')
@section('content')
    <style>
        .card-body > * {
            margin-bottom: 1em;
        }
    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Sửa Thông Tin Tài Khoản</h1>
                    <a href="{{route('quan-tri.user.index')}}">
                        <button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="col-12">
        <div class="card ">
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
        </div>
    </div>
    <div class="col-12">
        <!-- general form elements -->
        <div class="card">
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('quan-tri.user.update',['id'=>$user->id])}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input value="{{$user->name}}" type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <div class="input-group">
                            <input value="{{$user->date}}" name="date" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask im-insert="false">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input value="{{$user->email}}" type="email" class="form-control" id="name" name="email"
                               readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Số điện thoại</label>
                        <input value="{{$user->phone}}" type="text" class="form-control" id="name" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="name">Địa chỉ</label>
                        <input value="{{$user->address}}" type="text" class="form-control" id="name" name="address">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Ảnh</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="new_image">
                        @if($user->image)
                            <img class="mt-2" src="{{asset($user->image)}}" width="200">
                        @endif
                    </div>
                    <div class="form-group">
                        {{--                        <label for="name">Mật khẩu</label>--}}
                        <input hidden value="{{bcrypt($user->password)}}" type="password" class="form-control" id="name"
                               name="password">
                    </div>
                    <div class="form-group">
                        <label for="role">Quyền hạn</label><br>
                        <select name="role" id="">
                            <option {{$user->role == 1 ? 'selected' : ''}} value="1">Quản lý</option>
                            <option {{$user->role == 0 ? 'selected' : ''}} value="0">Nhân viên</option>
                            <option {{$user->role == 2 ? 'selected' : ''}} value="2">Khách hàng</option>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Sửa Thông Tin</button>
                    <a href="{{route('quan-tri.user.show_profile', ['id'=>Auth::user()->id])}}"><button class="btn btn-secondary">Cancel</button></a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
@section('js')
    <script src="/admin/plugins/moment/moment.min.js"></script>
    <script src="/admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script>
        $(function () {
            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('[data-mask]').inputmask()
        })
    </script>

@endsection
