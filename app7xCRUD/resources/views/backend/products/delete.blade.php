@extends("backend.layouts.main")
@section("title"," xóa sản phẩm")
@section("content")
<h1>Xóa sản phẩm</h1>
<form name="product" action="{{ url("/backend/product/destroy/$productdelete->id") }}" method="post">
       @csrf
       <div class="form-group">
           <label for="product_name">ID sản phẩm:</label>
           <p>{{ $productdelete->id }}</p>
       </div>
       <div class="form-group">
           <label for="product_name">Tên sản phẩm:</label>
           <p>{{ $productdelete->product_name }}</p>
       </div>
       <button type="submit" class="btn btn-danger">Xác nhận xóa sản phẩm</button>
   </form>
@endsection