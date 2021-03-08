@extends('Admin.layout.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Sửa Thông Tin Chất Liệu</h1>
                    <a href="{{route('quan-tri.material.index')}}">
                        <button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content col-lg-12">
        <!-- left column -->
        <div class="col-md-12 col-lg-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="{{route('quan-tri.material.update',['id'=>$material->id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Tên chất liệu</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$material->name}}">
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                        <input type="reset" class="btn btn-default pull-right" value="Reset">
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </section>
@endsection
