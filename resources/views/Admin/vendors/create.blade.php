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
                    <h1>Thêm Mới Đối Tác</h1>
                    <a href="{{route('quan-tri.vendors.index')}}"><button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button></a>
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

            <form role="form" action="{{route('quan-tri.vendors.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên đối tác</label>
                        <input value="{{old('name')}}" type="text" class="form-control" id="name" name="name" placeholder="Nhập tên đối tác">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Ảnh</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                    </div>
                    <div class="form-group">
                        <label for="content_title">Tiêu đề</label>
                        <textarea name="content_title" class="textarea" placeholder=""
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content_description">Nội dung</label>
                        <textarea name="content_description" class="textarea" placeholder=""
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="position">Vị trí</label>
                        <input type="number" class="form-control" id="position" min="0" value="0" name="position">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="1" id="is_active" name="is_active">
                        <label class="form-check-label" for="is_active">Trạng Thái</label>
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
