@extends('admin.layouts.main')
@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Thêm sản phẩm</div>

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $errors->first() }}</strong>
                        </div>
                        @endif

                        @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ session()->get('success') }}</strong>
                        </div>
                    @endif

                    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                             
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select name="category_id" class="form-control">
                                                @includeWhen(true, 'admin.partials.category_options', [
                                                    'categories' => $categories,
                                                    'nth' => 0,
                                                    'process_id' => null
                                                ])
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input type="text" name="product_code" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Giá sản phẩm (Giá chung)</label>
                                            <input type="number" name="price" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Sản phẩm có nổi bật</label>
                                            <select name="is_highlight" class="form-control">
                                                <option value="0">Không</option>
                                                <option value="1">Có</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Số lượng</label>
                                            <input type="number" min="0" value="0" name="quantity" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ảnh sản phẩm</label>
                                            <input id="img" type="file" name="avatar" class="form-control hidden"
                                                onchange="changeImg(this)">
                                            <img id="avatar" class="thumbnail" width="100%" height="350px" src="{{asset('assets/admin')}}/img/import-img.png">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Thông tin</label>
                                            <textarea name="detail" style="width: 100%;height: 100px;"></textarea>
                                        </div>
                                     </div>

                     
                        
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea id="editor" name="description" style="width: 100%;height: 100px;"></textarea>
                                    </div>
                                    <button class="btn btn-success" name="add-product" type="submit">Thêm sản phẩm</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                </div>
                            </div>
                        <div class="clearfix"></div>
                    </div>
                    </form>
                </div>

            </div>
        </div>

        <!--/.row-->
    </div>
    
@endsection

@push('js')
    <script>
        function changeImg(input){
    		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    		    if(input.files && input.files[0]){
    		        var reader = new FileReader();
    		        //Sự kiện file đã được load vào website
    		        reader.onload = function(e){
    		            //Thay đổi đường dẫn ảnh
    		            $('#avatar').attr('src',e.target.result);
    		        }
    		        reader.readAsDataURL(input.files[0]);
    		    }
    		}
    		$(document).ready(function() {
    		    $('#avatar').click(function(){
    		        $('#img').click();
    		    });
    		});
    
    </script>
@endpush