@extends('Admin.layout.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Thêm Mới Tin Tức</h1>
                    <a href="{{route('quan-tri.article.index')}}"><button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button></a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="col-md-12">
        <form role="form" action="{{route('quan-tri.article.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card  ">
                <div class="card-header">
                    <label class="card-title">Tiêu Đề</label>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nhập tiêu đề ..." name="title">
                    </div>
                </div>
            </div>

            <div class="card  ">
                <div class="form-group">
                    <div class="card-header">
                        <label for="exampleFormControlFile1">Ảnh</label>
                    </div>
                    <div class="card-body">
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                    </div>
                </div>
            </div>

            <div class="card  ">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 16px; font-weight: 700">
                        Nội Dung
                    </h3>
                    <!-- tools box -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body pad">
                    <div class="mb-3">
                        <div class="form-group">
                            <div class="mb-3">
                                <textarea name="summary" class="textarea" placeholder="Place some text here"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card  ">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 16px; font-weight: 700">
                        Mô Tả
                    </h3>
                    <!-- tools box -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body pad">
                    <div class="mb-3">
                        <div class="form-group">
                            <div class="mb-3">
                                <textarea name="description" class="textarea" placeholder="Place some text here"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

{{--            <div class="card  ">--}}
{{--                <div class="card-header">--}}
{{--                    <label class="card-title">Loại</label>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="number" class="form-control" id="type" min="0" value="0" name="type">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="card  ">
                <div class="card-header">
                    <label class="card-title">Vị trí</label>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="number" class="form-control" id="position" min="0" value="0" name="position">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="1" id="is_active" name="is_active">
                        <label class="form-check-label" for="is_active">Trạng Thái</label>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-info" style="padding: .5em 4em;">Thêm</button>
                <input type="reset" class="btn btn-default pull-right" style="padding: .5em 2em;" value="Reset">
            </div>
        </form>
    </div>
@endsection
