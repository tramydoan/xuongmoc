@extends('Admin.layout.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Sửa Thông Tin Sản Phẩm</h1>
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

            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{route('quan-tri.product.update',['id'=>$product->id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                            <label for="image">Ảnh sản phẩm</label>
                            <input type="file" class="" id="image" name="new_image"><br>
                            <img src="{{asset($product->image)}}" width="200">
                        </div>
                        <div class="form-group">
                            <label for="imageDetail">Ảnh chi tiết</label>
                            <input type="file" class="" id="imageDetail" name="images[]" multiple> <br>
                            @foreach($product->product_Images as $img)
                                <img src="{{asset($img->image)}}" width="90" style="margin-right: 8px">
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputFile">Giá gốc (vnđ)</label>
                                <input type="number" class="form-control" id="cost" name="cost"
                                       value="{{$product->cost}}">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">Giá bán (vnđ)</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                           value="{{$product->price}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">Giá khuyến mại (vnđ)</label>
                                    <input type="number" class="form-control" id="sale" name="sale"
                                           value="{{$product->sale}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Danh mục sản phẩm</label>
                                <select class="form-control" name="categories_id">
                                    <option value="0">-- chọn Danh Mục --</option>
                                    @foreach($categories as $category)
                                        <option
                                            {{($product->categories_id == $category->id ? 'selected' : '')}} value="{{$category->id}}">
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Chất liệu</label>
                                <select name="material[]" class="select2" multiple="multiple"
                                        data-placeholder="-- chọn Chất Liệu --" data-dropdown-css-class="select2"
                                        style="width: 100%;">
                                    @foreach($material as $mt)
                                        <option
                                            value="{{$mt->id}}">
                                            {{$mt->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="exampleInputFile">Số lượng</label>
                                <input type="number" class="form-control" id="stock" name="stock"
                                       value="{{$product->stock}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input type="number" class="form-control" id="position" name="position"
                                       value="{{$product->position}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input {{($product->is_active) ? 'checked':''}} type="checkbox" name="is_active">
                                    <b>Trạng thái</b>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input {{($product->is_hot) ? 'checked':''}} type="checkbox" name="is_hot"> <b>Sản
                                        phẩm Hot</b>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea id="editor5" name="description" class="form-control"
                                      rows="5">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Đặc trưng</label>
                            <textarea id="editor3" name="featured" class="form-control"
                                      rows="5">{{$product->featured}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Thông số</label>
                            <textarea id="editor4" name="specifications" class="form-control"
                                      rows="5">{{$product->specifications}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Bảo quản</label>
                            <textarea id="editor1" name="preservation" class="form-control"
                                      rows="5">{{$product->preservation}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Bảo hành</label>
                            <textarea id="editor3" name="guarantee" class="form-control"
                                      rows="5">{{$product->guarantee}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Cam kết</label>
                            <textarea id="editor4" name="commitment" class="form-control"
                                      rows="5">{{$product->commitment}}</textarea>
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
