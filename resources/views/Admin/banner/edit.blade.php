@extends('Admin.layout.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Sửa Thông Tin Banner</h1>
                    <a href="{{route('quan-tri.banner.index')}}">
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
                <div class="box-header with-border">
                    <h3 class="box-title">Thông Tin Banner</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{route('quan-tri.banner.update',['id'=>$banner->id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Tiêu Đề</label>
                            <input type="text" class="form-control" id="tile" name="title" value="{{$banner->title}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh</label>
                            <input type="file" class="" id="image" name="new_image"><br>
                            <img src="{{asset($banner->image)}}" width="200">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Vị trí</label>
                            <input type="number" class="form-control w-50" id="position" name="position"
                                   value="{{$banner->position}}">
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input {{($banner->is_active) ? 'checked':''}} type="checkbox"
                                           value="{{$banner->is_active}}" name="is_active"> <b>Trạng thái</b>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input {{($banner->is_page) ? 'checked':''}} type="checkbox"
                                           value="{{$banner->is_page}}" name="is_page"> <b>Banner của Trang Sản Phẩm</b>
                                </label>
                            </div>
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
