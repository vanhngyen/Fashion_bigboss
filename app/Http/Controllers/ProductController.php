<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function listProduct(){
        $products = Product::paginate(20);
        return view("product.list",["products"=>$products]);
    }

    public function newProduct(){
        $categories = Category::all();
        $brands = Brand::all();

        return view("product.new",["categories"=>$categories,"brands"=>$brands]);
    }

    public function saveProduct(Request $request){
        $request->validate([
            "product_name"=>"required|string|min:6|unique:products",
            "product_desc"=>"required|string|min:2|unique:products",
            "price"=>"required|int",
            "qty"=>"required|int"
        ]);
        try {
            Product::create([
                "product_name"=>$request->get("product_name"),
                "product_desc"=>$request->get("product_desc"),
                "price" => $request->get("price"),
                "qty" => $request->get("qty"),
                "category_id" => $request->get("category_id"),
                "brand_id" => $request->get("brand_id"),
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/list-product");
    }
}
