@extends('Admin.layout.main')
@section('content')
    <style>
        td span{font-weight: 700;margin-right: 7px;}
        td {padding: .6em 0;}
    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Thông Tin Danh Mục</h1>
                    <a href="{{route('quan-tri.category.index')}}"><button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button></a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body col-12 d-flex justify-content-between align-content-center">
                <div class="col-md-6">
                    <img class="w-100" src="{{asset($show->image)}}" alt="">
                </div>
                <table class="col-md-6">
                    <tbody>
                        <tr>
                            <td><span>Tên Sản Phẩm:</span> {{$show->name}}</td>
                        </tr>

                        <tr>
                            <td><span>Vị Trí:</span> {{$show->position}}</td>
                        </tr>
                        <tr>
                            <td><span>Trạng Thái:</span> {{ ($show->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
