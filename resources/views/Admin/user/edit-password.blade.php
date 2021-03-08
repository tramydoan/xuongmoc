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
                    <h1>Đổi Mật Khẩu</h1>
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
        <div class="card">
            <!-- form start -->
            <form role="form" action="{{route('quan-tri.user.update_password',['id'=>$user->id])}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        @if($user->image)
                            <img src="{{asset($user->image)}}" width="200">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input readonly value="{{$user->name}}" type="text" class="form-control" id="name" name="name">
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
                    <div class="form-check">
                        <input hidden {{($user->role==1) ? 'checked':''}} type="checkbox" value="1"
                               class="form-check-input" id="role" name="role">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary px-4">Sửa</button>
{{--                    <a href="{{route('quan-tri.user.show_profile', ['id'=>Auth::user()->id])}}"><button class="btn btn-secondary">Cancel</button></a>--}}
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
@section('my_javascript')
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endsection

