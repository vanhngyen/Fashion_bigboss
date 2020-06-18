<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $most_views=Product::orderBy("view_count","DESC")->limit(8)->get();
        $categories=Category::all();
        $products=Product::all();
        $brands=Brand::all();
        foreach ($products as $p){
            $slug=\Illuminate\Support\Str::slug($p->__get("product_name"));
            $p->slug=$slug=$slug.$p->__get("id");
            $p->save();
            //$p->update(["slug"=>$slug.$p->__get("id");
        }
        foreach ($categories as $p){
            $slug=\Illuminate\Support\Str::slug($p->__get("category_name"));
            $p->slug=$slug=$slug.$p->__get("id");
            $p->save();
            //$p->update(["slug"=>$slug.$p->__get("id");
        }
        $featureds=Product::orderBy("updated_at","DESC")->limit(8)->get();
        $lastest_1=Product::orderBy("created_at","DESC")->limit(3)->get();
        $lastest_2=Product::orderBy("created_at","DESC")->offset(3)->limit(3)->get();
        return view('frontend.home',[
            "categories"=>$categories,
            "most_views"=>$most_views,
            "featureds"=>$featureds,
            "lastest_1"=>$lastest_1,
            "lastest_2"=>$lastest_2,
        ]);
    }
    public function category(Category $category){
        $products=$category->Products()->paginate(12);
        return view("frontend.category",[
            "category"=>$category,
            "products"=>$products,
        ]);
    }
    public function product(Product $product){
        if(!session()->has("view_count_{$product->__get("id")}")){
            $product->increment("view_count");
            session(["view_count_{$product->__get("id")}"=> true]);
        }
        return view("frontend.product",[
            'product'=> $product
        ]);
    }

    public function addToCart(Product $product,Request $request){
        $qty = $request->has("qty")&& (int)$request->get("qty")>0?(int)$request->get("qty"):1;
        $myCart = session()->has("my_cart")&& is_array(session("my_cart"))?session("my_cart"):[];
        $contain = false;
        foreach ($myCart as $item){
            if($item["product_id"] == $product->__get("id")){
                $item["qty"]+= $qty;
                $contain = true;
                break;
            }
        }
        if(!$contain){
            $myCart[] = [
                "product_id" => $product->__get("id"),
                "qty" => $qty
            ];
        }
        session(["my_cart"=>$myCart]);
        return redirect()->to("/shopping-cart");
    }

    public function shoppingCart(){
        $myCart = session()->has("my_cart") && is_array(session("my_cart"))?session("my_cart"):[];
        $productIds = [];
        foreach ($myCart as $item){
            $productIds[] = $item["product_id"];
        }
        $grandTotal = 0;
        $products = Product::find($productIds);
        foreach ($products as $p){
            foreach ($myCart as $item){
                if($p->__get("id") == $item["product_id"]){
                    $grandTotal += ($p->__get("price")*$item["qty"]);
                    $p->cart_qty = $item["qty"];
                }
            }
        }
        return view("frontend.cart",[
            "products"=>$products,
            "grandTotal" => $grandTotal
        ]);
    }

    public function checkout(){
        return view("frontend.checkout");
    }

}
