@extends('Admin.layout.main')
@section('content')
    <style>
        .card-danger .card-title {
            font-size: 1.5rem;
        }

        .card-danger .card-body {
            padding: .7em 1.25rem
        }
    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Thêm Mới Sản Phẩm</h1>
                    <a href="{{route('quan-tri.product.index')}}">
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
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card">
                <form role="form" action="{{route('quan-tri.product.store')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input value="{{old('name')}}" type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh sản phẩm</label>
                            <input type="file" class="" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh chi tiết</label>
                            <input type="file" class="" id="image" name="images[]" multiple>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputFile">Giá gốc (vnđ)</label>
                                <input type="number" class="form-control" id="cost" name="cost" value="0">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">Giá bán (vnđ)</label>
                                    <input type="number" class="form-control" id="price" name="price" value="0">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">Giá khuyến mại (vnđ)</label>
                                    <input type="number" class="form-control" id="sale" name="sale" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Danh mục sản phẩm</label>
                                <select class="form-control" name="categories_id">
                                    <option value="0">-- chọn Danh Mục --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category -> id }}">{{ $category -> name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Chất liệu</label>
                                <select name="material[]" class="select2" multiple="multiple"
                                        data-placeholder="-- chọn Chất Liệu --"0
                                        data-dropdown-css-class="select2"
                                        style="width: 100%;">
                                    @foreach($material as $item)
                                        <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="exampleInputFile">Số lượng</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="0">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input type="number" class="form-control" id="position" name="position"
                                       value="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="is_active"> <b>Trạng thái</b>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="is_hot"> <b>Sản phẩm Hot</b>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea id="editor3" name="description" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Đặc trưng</label>
                            <textarea id="editor3" name="featured" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Thông số</label>
                            <textarea id="editor4" name="specifications" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Bảo quản</label>
                            <textarea id="editor1" name="preservation" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Bảo hành</label>
                            <textarea id="editor3" name="guarantee" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Cam kết</label>
                            <textarea id="editor4" name="commitment" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tạo</button>
                        <input type="reset" class="btn btn-default pull-right" value="Reset">
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>

        <!-- /.row -->
    </section>
@endsection

@section('js')
    <script type="text/javascript">
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
