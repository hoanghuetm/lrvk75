@extends('admin.layouts.main')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh mục</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý danh mục</h1>
			</div>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-md-12">
				<a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Thêm mới</a>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-7">
								<h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
								<div class="vertical-menu">
									<div class="item-menu active">Danh mục </div>

									@includeWhen(true, 'admin.partials.category_rows', [
										'categories' => $categories,
										'nth' => 0
										
									])
									
									

									{{-- <div class="item-menu"><span>---|Áo khoác Nam</span>
										<div class="category-fix">
											<a class="btn-category btn-primary" href="editcategory.html"><i class="fa fa-edit"></i></a>
											<a class="btn-category btn-danger" href="#"><i class="fas fa-times"></i></i></a>

										</div>
									</div>
									<div class="item-menu"><span>---|---|Áo khoác Nam (Dành cho việc mở rộng)</span>
										<div class="category-fix">
											<a class="btn-category btn-primary" href="editcategory.html"><i class="fa fa-edit"></i></a>
											<a class="btn-category btn-danger" href="#"><i class="fas fa-times"></i></i></a>

										</div>
									</div>
									<div class="item-menu"><span>Nữ</span>
										<div class="category-fix">
											<a class="btn-category btn-primary" href="editcategory.html"><i class="fa fa-edit"></i></a>
											<a class="btn-category btn-danger" href="#"><i class="fas fa-times"></i></i></a>

										</div>
									</div>
									<div class="item-menu"><span>---|Áo khoác Nữ</span>
										<div class="category-fix">
											<a class="btn-category btn-primary" href="editcategory.html"><i class="fa fa-edit"></i></a>
											<a class="btn-category btn-danger" href="#"><i class="fas fa-times"></i></i></a>

										</div> --}}
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/.col-->


		</div>
		<!--/.row-->
	</div>
	<!--/.main-->
@endsection

@push('js')
<script>
$(document).ready(function() {
	
	$('.btn-delete').click(function(e) {
		e.preventDefault();
		let id = $(this).attr('data-id');
		
		$.ajax({
			url: `/admin/categories/${id}`,
			method: "POST",
			data: {
				_token: "{{ csrf_token() }}",
				_method: "DELETE"
			},
			success: function() {
				window.location.reload();
			}
		});
	});
});
</script>
@endpush