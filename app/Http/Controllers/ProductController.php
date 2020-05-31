<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProduct(){
        $products = Product::with("Category")->with("Brand")->paginate(20);
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
            "price"=>"required|numeric|min:0",
            "qty"=>"required|numeric|min:1",
            "category_id"=>"required",
            "brand_id"=>"required",
        ]);
        try {
            $product_image = null;
            //xử lí để đưa ảnh nên media trong public sau đó đưa nguồn file cho vào biến
            if($request->hasFile("product_image")){
                $file = $request->file("product_image");
                $allow = ["png","jpg","jpeg","gif"];
                $extName = $file->getClientOriginalExtension();//lay dưới
                if(in_array($extName,$allow)){
                    $fileName = time().$file->getClientOriginalName();//get fileName
                    $file->move(public_path("media"),$fileName);//upload file into public/media
                    //convert string to productImage
                    $product_image ="media/".$fileName;
                }

            }
            Product::create([
                "product_name"=>$request->get("product_name"),
                "product_image"=>$product_image,
                "product_desc"=>$request->get("product_desc"),
                "price" => $request->get("price"),
                "qty" => $request->get("qty"),
                "category_id" => $request->get("category_id"),
                "brand_id" => $request->get("brand_id"),
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("admin/list-product");
    }

    public function editProduct($id){
        $product = Product::findOrFail($id);
        $category = Category::all();
        $brand = Brand::all();
        return view("product.edit",["product"=>$product,"categories"=>$category,"brands"=>$brand]);
    }

    public function updateProduct($id,Request $request){
        $product = Product::findOrFail($id);
        $request->validate([
            "product_name" => "required|min:3|unique:products,product_name,{$id}",
            "product_desc" => "required",
            "price" => "required|numeric|min:0",
            "qty" => "required|numeric|min:1",
            "category_id" => "required",
            "brand_id" => "required",
        ]);

        try {
            $product_image = $product->get("product_image");
            if($request->hasFile("product_image")){
                $file = $request->file("product_image");
                $allow = ["png","jpg","jpeg","gif"];
                $extName = $file->getClientOriginalExtension();
                if(in_array($extName,$allow)){
                    $fileName = time().$file->getClientOriginalName(); //  lấy tên gốc original của file gửi lên từ client
                    $file->move(public_path("media"),$fileName); // đẩy file vào thư mục media với tên là fileName
                    //convert string to ProductImage
                    $product_image = "media/".$fileName; // lấy nguồn file
                }
            }
            $product->update([
                "product_name"=>$request->get("product_name"),
                "product_image"=>$product_image,
                "product_desc"=>$request->get("product_desc"),
                "price"=>$request->get("price"),
                "qty"=>$request->get("qty"),
                "category_id"=>$request->get("category_id"),
                "brand_id"=>$request->get("brand_id"),
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("admin/list-product");
    }

    public function deleteProduct($id){
        $product = Product::findOrfail($id);
        try {
            $product->delete();
        }catch (\Exception $exception){

        }
        return redirect()->to("admin/list-product");
    }
}


