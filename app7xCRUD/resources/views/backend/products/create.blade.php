@extends("backend.layouts.main")
@section("title"," tạo mới sản phẩm")
@section("content")
<h1> Tạo mới sản phẩm</h1>
@if($errors->any()){
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
</div>

}
@endif	
<form name="product" action="{{ url("/backend/product/store")}}" method="post">
	@csrf
    <div class="form-group">
      <label for="product_name">Tên sản phẩm:</label>
      <input type="text" class="form-control" id="product_name" placeholder="Nhập tên sản phẩm" name="product_name">
    </div>
    <div class="form-group">
      <label for="product_image">ảnh sản phẩm:</label>
      <input type="file" class="form-control" id="product_image" name="product_image">
    </div>
	<div class="form-group">
		<label for="product_descrip">Mô tả sản phẩm</label>
		<textarea name="product_desc" class="form-control" id="product_desc" cols="30" rows="10">

		</textarea>
	</div>
	<div class="form-group">
		<label for="product_publish"> Thời gian mở bán sản phẩm</label>
		<input type="text" name="product_publish" style="width: 250px;" class="form-control" id="product_publish">
	</div>
	<div class="form-group">
		<label for="product_quantity">Tồn kho sản phẩm</label>
		<input type="number" name="product_quantity" style="width: 250px;" class="form-control" id="product_quantity">
	</div>
	<div class="form-group">
		<label for="product_price">Nhập giá sản phẩm</label>
		<input type="product_price" name="product_price" id="product_price" class="form-control" style="width: 250px;">
	</div>
    <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
  </form>
@endsection
@section("appendjs")
<link rel="stylesheet" href="{{ asset("/be-assets/js/bootstrap-datetimepicker.min.css") }}" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
<script src="{{ asset("/be-assets/js/bootstrap-datetimepicker.min.js") }}"></script>
<script type="text/javascript">
	// định dạng thời gian là YYYY-MM-DD HH:mm:ss
   $(function () {
       $('#product_publish').datetimepicker({
       	format:"YYYY-MM-DD HH:mm:ss",
       	icons: {
			   time: 'far fa-clock',
			   date: 'far fa-calendar',
			   up: 'fas fa-arrow-up',
			   down: 'fas fa-arrow-down',
			   previous: 'fas fa-chevron-left',
			   next: 'fas fa-chevron-right',
			   today: 'fas fa-calendar-check',
			   clear: 'far fa-trash-alt',
			   close: 'far fa-times-circle'
			}
       });
   });
</script>
<script src="{{ asset("/be-assets/js/tinymce/tinymce.min.js") }}"></script>
<script>
   tinymce.init({
       selector: '#product_desc'
   });
</script>
@endsection