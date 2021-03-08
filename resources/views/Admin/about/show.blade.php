@extends('Admin.layout.main')
@section('content')
    <style>
        span {font-weight: 700;margin-right: 7px;}
        .about-detail{padding: .8em 0;}
        .tab-content {padding: 1.25em;}
    </style>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Chi Tiết Giới Thiệu</h1>
                    <a href="{{route('quan-tri.about.index')}}">
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
                    <div class="col-12 col-sm-6">
                        <img class="w-100" src="{{asset($show->image)}}" alt="">
                    </div>
                    <div class="col-12 col-sm-6 article-detail">
                        <div>
                            <span>Tiêu Đề:</span> {{$show->title}}
                        </div>
                        <div>
                            <span>Vị Trí:</span> {{$show->position}}
                        </div>
                        <div>
                            <span>Trạng Thái:</span> {{ ($show->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}
                        </div>
                    </div>
                </div>
                <div class="about-detail">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab" aria-controls="content" aria-selected="true">Nội Dung</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade  show active" id="content" role="tabpanel" aria-labelledby="content-tab">{!! $show->content !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
