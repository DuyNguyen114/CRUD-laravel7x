<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\ProductsModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\request;

class ProductsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(Request $request){

        $product_name = $request->input('product_name','');
        $product_desc = $request->input('product_desc','');
        $product_publish = $request->input('product_publish','');
        $product_quantity = $request->input('product_quantity',0);
        $product_price = $request->input('product_price',0);

        $product = new ProductsModel();
        if(!$product_publish){
            $product_publish = date("Y-m-d H:i:s");
        }

        $product->product_name = $product_name;
        $product->product_desc = $product_desc;
        $product->product_publish = $product_publish;
        $product->product_quantity = $product_quantity;
        $product->product_price = $product_price;


        $product->save();

        return redirect("backend.product.index");

    }

    public function index(){
        $products = ProductsModel::all();

        $data = [];
        $data['products'] = $products;
        return view("backend.products.index", $data);
    }

    public function edit($id){

        $product = ProductsModel::findOrFail($id);

        $data = [];
        $data['products'] = $product;
        return view ("backend.product.edit", $data);
    }

    public function update(Request $request, $id){
        $validateData = $request->validate([
            'product_name' => 'required',
            'product_desc' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required',
        ]);

        $product_name = $request->input('product_name','');
        $product_desc = $request->input('product_desc','');
        $product_publish = $request->input('product_publish','');
        $product_quantity = $request->input('product_quantity',0);
        $product_price = $request->input('product_price',0);

        $product = ProductsModel::findOrFail($id);

        $product->product_name = $product_name;
        $product->product_desc = $product_desc;
        $product->product_publish = $product_publish;
        $product->product_quantity = $product_quantity;
        $product->product_price = $product_price;

        $product->save();

        return redirect("/backend/product/edit/$id")->with('status', 'cập nhật thành công');
    }

    public function delete($id){
        $product = ProductsModel::findOrFail($id);

        $data = [];
        $data["product"] = $product;

        return view("backend.products.delete", $data);
    }

    public function destroy($id){
        $product = ProductsModel::findOrFail($id);
        $product->delete();

        return redirect("/backend/product/index")->with("status", 'xóa thành công');
    }
}
