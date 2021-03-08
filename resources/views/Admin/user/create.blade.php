@extends('Admin.layout.main')
@section('content')
    <style>
        .card-footer button {
            padding: .375rem 2rem;
        }
    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Thêm Nhân viên mới</h1>
                    <a href="{{route('quan-tri.user.index')}}">
                        <button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="col-sm-12">
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
            <form role="form" action="{{route('quan-tri.user.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên nhân viên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên nhân viên">
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <div class="input-group">
                            <input name="date" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask im-insert="false">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" id="name" name="email" placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <label for="name">Mật khẩu</label>
                        <input type="password" class="form-control" id="name" name="password"
                               placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <label for="name">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" id="name" name="passwordAgain"
                               placeholder="Nhập lại mật khẩu">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Số điện thoại</label>
                            <input type="text" class="form-control" id="name" name="phone"
                                   placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Địa chỉ</label>
                            <input type="text" class="form-control" id="name" name="address" placeholder="Nhập địa chỉ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Ảnh</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                    </div>
                    <div class="form-group">
                        <label for="role">Quyền hạn</label><br>
                        <select name="role" id="">
                            <option value="1">Quản lý</option>
                            <option value="0">Nhân viên</option>
                            <option value="2">Khách hàng</option>
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tạo</button>
                    <input type="reset" class="btn btn-default pull-right" value="Reset">
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
