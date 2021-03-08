@extends('Admin.layout.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Từ khóa tìm kiếm "{{$keyword}}" ({{$totalResult}})</h1>
                    <a href="{{route('quan-tri.user.index')}}">
                        <button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead class="text-center">
                        <tr>
                            <th>STT</th>
                            <th>Tên Tài Khoản</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Ảnh</th>
                            <th>Quyền Hạn</th>
                            <th>Tác Vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $key => $item)
                            <tr class="text-center item-{{$item->id}}">
                                <td>{{($key + 1)}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>
                                    @if ($item->image)
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
                                    <a class="btn btn-primary btn-sm" href="{{route('quan-tri.user.show',['id'=>$item->id])}}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if(auth()->user()->role != 0)
                                    <a class="btn btn-danger btn-sm" href="/category/{{ $item->id }}/delete" onclick="return confirm('Bạn có xác nhận xóa?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{$user -> appends(Request::all())->links()}}
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
