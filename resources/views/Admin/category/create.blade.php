@extends('Admin.layout.main')
@section('content')
<style>
	.card-body > * {
		margin-bottom: 1em;
	}
</style>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12 d-flex justify-content-between align-items-center">
				<h1>Thêm Mới Danh Mục</h1>
				<a href="{{route('quan-tri.category.index')}}"><button type="button" class="btn btn-info"><i class="fas fa-th-list mr-2"></i>Danh sách</button></a>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<div class="col-md-6">
	<!-- general form elements -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Thông tin danh mục</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form role="form" action="{{route('quan-tri.category.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
{{--				<div class="form-group">--}}
{{--                  <label>Danh mục cha</label>--}}
{{--                  <select name="parent_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">--}}
{{--                   <option value="0">--Chọn--</option>--}}
{{--                  	@foreach ($them as $item)--}}
{{--                    <option value="{{$item->id}}" {{($item->parent_id == $item->id ? 'selected' : '')}}>{{$item->name}}</option>--}}
{{--                    @endforeach--}}
{{--                  </select>--}}
{{--                </div>--}}
				<div class="form-group">
					<label for="name">Tên danh mục</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục">
				</div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Ảnh</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                </div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" value="1" id="is_active" name="is_active">
					<label class="form-check-label" for="is_active">Trạng Thái</label>
				</div>
				<div class="form-group">
					<label for="position">Vị trí</label>
					<input type="number" class="form-control" id="position" min="0" value="0" name="position">
				</div>

			</div>
			<!-- /.card-body -->

			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Tạo</button>
			</div>
		</form>
	</div>
	<!-- /.card -->
</div>
@endsection
