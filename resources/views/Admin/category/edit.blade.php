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
                    <h1>Thêm Mới Danh Mục</h1>
                    <a href="{{route('quan-tri.category.index')}}"><button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button></a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Thông tin danh mục</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('quan-tri.category.update',['id'=>$category->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
{{--                    <div class="form-group">--}}
{{--                        <label>Danh mục cha</label>--}}
{{--                        <select name="parent_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">--}}
{{--                            <option value="0">--Chọn--</option>--}}
{{--                            @foreach($data as $key => $item)--}}
{{--                                <option {{($category->parent_id == $item->id ? 'selected' : '')}} value="{{$item->id}}">--}}
{{--                                    {{$item->name}}--}}
{{--                                </option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label for="name">Tên danh mục</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
                    </div>

                    <div class="form-group">
                        <label for="new_image">Ảnh</label>
                        <input type="file" class="form-control-file" id="new_image" name="new_image">

                        @if($category->image)
                            <img src="{{asset($category->image)}}" width="200">
                        @endif

                    </div>
                    <div class="form-check">
                        <input {{($category->is_active) ? 'checked':''}} type="checkbox" class="form-check-input" id="is_active" name="is_active">
                        <label class="form-check-label" for="is_active">Trạng Thái</label>
                    </div>
                    <div class="form-group">
                        <label for="position">Vị trí</label>
                        <input type="number" class="form-control" id="position" min="0" value="{{$category->position}}" name="position">
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
