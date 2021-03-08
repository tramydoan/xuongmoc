@extends('Admin.layout.main')
@section('content')
    <style>
        ul {list-style: none; padding: 0; margin: 0}
        ul li {padding: 0.3em 0}

    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Sửa Thông Tin Đối Tác</h1>
                    <a href="{{route('quan-tri.vendors.index')}}">
                        <button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content col-lg-12">
        <div class="card">


        <!-- form start -->
            <form role="form" action="{{route('quan-tri.vendors.update',['id'=>$vendors->id])}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên đối tác</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{$vendors->name}}">
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh</label>
                        <input type="file" class="" id="image" name="new_image"><br>
                        <img src="{{asset($vendors->image)}}" width="200">
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <textarea id="editor1" name="content_title" class="form-control" rows="5" >{{$vendors->content_title}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea id="editor2" name="content_description" class="form-control" rows="5" >{{$vendors->content_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vị trí</label>
                        <input type="number" class="form-control w-50" id="position" name="position"
                               value="{{$vendors->position}}">
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input {{($vendors->is_active) ? 'checked':''}} type="checkbox"
                                       value="{{$vendors->is_active}}" name="is_active"> <b>Trạng thái</b>
                            </label>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <input type="reset" class="btn btn-default pull-right" value="Reset">
                </div>
            </form>
        </div>
    </section>
@endsection
