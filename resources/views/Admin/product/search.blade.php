@extends('Admin.layout.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Từ khóa tìm kiếm "{{$keyword}}" ({{$totalResult}})</h1>
                    <a href="{{route('quan-tri.product.index')}}">
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
                            <th>Tên Sản Phẩm</th>
                            <th>Ảnh</th>
                            <th>Danh Mục Cha</th>
                            <th>Số Lượng</th>
                            <th>Trạng Thái</th>
                            <th>Tác Vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $item)
                            <tr class="text-center item-{{$item->id}}">
                                <td>{{($key + 1)}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{asset($item->image)}}" alt="" width="60" height="50">
                                    @endif
                                </td>
                                <td>{{$item->Category->name ?? 'Trống'}}</td>
                                <td>{{$item->stock}}</td>
                                <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
                                <td class="project-actions">
                                    <a class="btn btn-primary btn-sm" href="{{route('quan-tri.product.show',['id'=>$item->id])}}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{route('quan-tri.product.edit',['id'=>$item->id])}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="/product/{{ $item->id }}/delete" onclick="return confirm('Bạn có xác nhận xóa?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                        {{$products -> appends(Request::all())->links()}}
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
