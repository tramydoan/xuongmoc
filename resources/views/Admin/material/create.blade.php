@extends('Admin.layout.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Thêm Mới Chất Liệu</h1>
                    <a href="{{route('quan-tri.material.index')}}"><button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button></a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="col-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <!-- form start -->
            <form role="form" action="{{route('quan-tri.material.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên chất liệu</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên chất liệu">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tạo</button>
                    <input type="reset" class="btn btn-default pull-right" value="Reset">
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
