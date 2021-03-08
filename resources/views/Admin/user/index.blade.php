@extends('Admin.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý Tài Khoản</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/quan-tri">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý tài khoản</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="mb-3 mt-3 d-flex justify-content-between align-items-center col-12">
                            @if(auth()->user()->role != 0)
                                <a href="{{route('quan-tri.user.create')}}">
                                    <button type="button" class="btn btn-info">
                                        <i class="fas fa-plus mr-2"></i>
                                        Thêm Mới
                                    </button>
                                </a>
                            @endif
                            <div class="card-tools">
                                <form class="form-inline ml-3" method="GET" action="{{route('admin.user.search')}}">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input value="{{isset($keyword) ? $keyword : ''}}" name="tu-khoa" type="text"
                                               name="table_search" class="form-control float-right"
                                               placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead class="text-center">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Tài Khoản</th>
                                    <th>Email</th>
                                    <th>SĐT</th>
                                    <th>Ảnh</th>
                                    <th>Quyền Hạn</th>
                                    <th>Tác Vụ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($use as $item)
                                    <tr class="text-center">
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>@if ($item->image)
                                                <img src="{{asset($item->image)}}" alt="" width="60" height="50">
                                            @endif
                                        </td>
                                        <td>
                                            @switch($item->role)
                                                @case(0)
                                                {{'Nhân viên'}}
                                                @break
                                                @case(1)
                                                {{'Quản lý'}}
                                                @break
                                                @case(2)
                                                {{'Khách hàng'}}
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="project-actions">
                                            <a class="btn btn-primary btn-sm"
                                               href="{{route('quan-tri.user.show',['id'=>$item->id])}}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if(auth()->user()->role == 1)
                                            <a class="btn btn-info btn-sm" href="{{route('quan-tri.user.edit',['id'=>$item->id])}}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            @endif
                                            @if(auth()->user()->role != 0)
                                                <a class="btn btn-danger btn-sm" href="/user/{{ $item->id }}/delete"
                                                   onclick="return confirm('Bạn có xác nhận xóa?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                {{$use->links()}}
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
