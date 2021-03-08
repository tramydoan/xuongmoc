@extends('Admin.layout.main')
@section('content')
    <style>
        span {font-weight: 700;margin-right: 7px;}
        .prd-detail > * {padding: .4em 0;}
        .tab-content {padding: 1.25em;}
    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Thông Tin Liên Hệ</h1>
                    <a href="{{route('quan-tri.contact.index')}}">
                        <button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body col-12 ">
                <div class="d-flex justify-content-between align-content-center">
                    <div class="col-12 prd-detail">
                        <div>
                            <span>Tên:</span> {{$show->name}}
                        </div>
                        <div>
                            <span>Email:</span> {{$show->email}}
                        </div>
                        <div>
                            <span>Số Điện Thoại:</span> {{$show->phone}}
                        </div>
                        <div>
                            <span>Nội Dung:</span> {{$show->content}}
                        </div>
                        <div>
                            <span>Thông Tin Liên Hệ:</span> {{$show->homeContact}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
