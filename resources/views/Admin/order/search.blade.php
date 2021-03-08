@extends('Admin.layout.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Từ khóa tìm kiếm "{{$keyword}}" ({{$totalResult}})</h1>
                    <a href="{{route('quan-tri.order.index')}}">
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
                            <th>Tên Khách Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Tổng Tiền</th>
                            <th>Thanh Toán</th>
                            <th>Tác Vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $key => $item)
                            <tr class="text-center item-{{$item->id}}">
                                <td>{{($key + 1)}}</td>
                                <td>{{$item->ship_name}}</td>
                                <td>{{$item->ship_phone}}</td>
                                <td>{{$item->ship_address}}</td>
                                <td>{{$item->total_price}}</td>
                                <td>{{$item->payment_method}}</td>
                                @switch($item->status)
                                    @case(0)
                                    <td>
                                        <button type="button"
                                                data-url="{{route('quan-tri.order.edit', ['order' => $item->id])}}"
                                                class="btn btn-danger btn-status">Chưa giao
                                        </button>
                                    </td>
                                    @break;
                                    @case(1)
                                    <td>
                                        <button type="button"
                                                data-url="{{route('quan-tri.order.edit', ['order' => $item->id])}}"
                                                class="btn btn-warning btn-status">Đang giao
                                        </button>
                                    </td>
                                    @break;
                                    @case(2)
                                    <td>
                                        <button type="button"
                                                data-url="{{route('quan-tri.order.edit', ['order' => $item->id])}}"
                                                class="btn btn-success btn-status">Đã giao
                                        </button>
                                    </td>
                                    @break;
                                @endswitch

                                <td class="project-actions">
                                    <a class="btn btn-primary btn-sm"
                                       href="{{route('quan-tri.order.show',['id'=>$item->id])}}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="/category/{{ $item->id }}/delete"
                                       onclick="return confirm('Bạn có xác nhận xóa?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{$order -> appends(Request::all())->links()}}
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
