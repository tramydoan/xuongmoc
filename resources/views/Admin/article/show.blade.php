@extends('Admin.layout.main')
@section('content')
    <style>
        span {font-weight: 700;margin-right: 7px;}
        .article-detail{padding: .8em 0;}
        .tab-content {padding: 1.25em;}
    </style>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h1>Chi Tiết Tin Tức</h1>
                    <a href="{{route('quan-tri.article.index')}}">
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
                        <div>
                            <span>URL:</span> {{$show->url}}
                        </div>
                    </div>
                </div>
                <div class="article-detail">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="summary-tab" data-toggle="tab" href="#summary" role="tab" aria-controls="summary" aria-selected="true">Nội Dung</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="des-tab" data-toggle="tab" href="#des" role="tab" aria-controls="des" aria-selected="false">Mô Tả</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="summary" role="tabpanel" aria-labelledby="summary-tab">{!! $show->summary !!}</div>
                        <div class="tab-pane fade" id="des" role="tabpanel" aria-labelledby="des-tab">{!! $show->description !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
