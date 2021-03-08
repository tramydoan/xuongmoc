@extends('Admin.layout.main')
@section('js')
    <script>
        $('.btn-status').on('click', function (e) {
            var url = $(this).data('url');
            var btn = $(this);
            $.ajax({
                type: 'GET',
                url: url,
                success: function (data) {
                    var border = "none";
                    var color = "#dc3545";
                    var status = "Chưa giao";
                    switch (data.nextStatus) {
                        case 0:
                            color = "#dc3545";
                            status = "Chưa giao";
                            break;
                        case 1:
                            color = "#ffc107";
                            status = "Đang giao";
                            break;
                        case 2:
                            color = "#28a745";
                            status = "Giao hoàn tất";
                            break;
                    }
                    btn.css("background-color", color);
                    btn.css("border", border);
                    btn.html(status);
                },
                error: function (e) {
                    console.log(e)
                }
            })
        });
    </script>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Đơn Hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/quan-tri">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đơn hàng</li>
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
                        <div class="mb-3 mt-3 d-flex justify-content-between align-items-center col-12">

                            <div class="card-tools">
                                <form class="form-inline ml-3" method="GET" action="{{route('admin.order.search')}}">
                                    @csrf
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
                                    <th>Tên Khách Hàng</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Địa Chỉ</th>
                                    <th>Tổng Tiền</th>
                                    <th>Thanh toán</th>
                                    <th>Trạng Thái</th>
                                    <th>Tác Vụ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $key => $item)
                                    <tr class="text-center">
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->ship_name}}</td>
                                        <td>{{$item->ship_phone}}</td>
                                        <td>{{$item->ship_address}}</td>
                                        <td>{{number_format($item->total_price)}} vnđ</td>
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
                                            <a class="btn btn-danger btn-sm" href="/order/{{ $item->id }}/delete"
                                               onclick="return confirm('Bạn có xác nhận xóa?')">
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
