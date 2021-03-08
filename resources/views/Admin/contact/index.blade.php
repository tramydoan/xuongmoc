@extends('Admin.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liên Hệ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/quan-tri">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Liên Hệ</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
{{--                        <div class="mb-3 mt-3 d-flex justify-content-between align-items-center col-12">--}}
{{--                            <div class="card-tools">--}}
{{--                                <form class="form-inline ml-3" method="GET" action="{{route('admin.contact.search')}}">--}}
{{--                                    <div class="input-group input-group-sm" style="width: 150px;">--}}
{{--                                        <input value="{{isset($keyword) ? $keyword : ''}}" name="tu-khoa" type="text"--}}
{{--                                               name="table_search" class="form-control float-right"--}}
{{--                                               placeholder="Search">--}}

{{--                                        <div class="input-group-append">--}}
{{--                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead class="text-center">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Nội Dung</th>
                                    <th>Thông Tin Liên Hệ</th>
                                    <th>Tác Vụ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $key => $item)
                                    <tr class="text-center">
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->content}}</td>
                                        <td>{{$item->homeContact}}</td>
                                        <td class="project-actions">
                                            <a class="btn btn-primary btn-sm"
                                               href="{{route('quan-tri.contact.show',['id'=>$item->id])}}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="/contact/{{ $item->id }}/delete" onclick="return confirm('Bạn có xác nhận xóa?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                {{$list->links()}}
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
