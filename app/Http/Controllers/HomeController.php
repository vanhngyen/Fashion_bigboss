<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Brand;
use App\Category;
use App\Events\OrderCreated;
use App\Mail\SendMail;
use App\Order;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $woman = Product::with("Category")->with("Brand")->where("category_id", "=", "2")->get();
        $man = Product::with("Category")->with("Brand")->where("category_id", "=", "1")->get();
        $shoes = Product::with("Category")->with("Brand")->where("category_id", "=", "5")->get();
        $bag = Product::with("Category")->with("Brand")->where("category_id", "=", "4")->get();
        $watches = Product::with("Category")->with("Brand")->where("category_id", "=", "6")->get();

        $most_views = Product::orderBy("view_count", "DESC")->limit(8)->get();
        $categories = Category::all();
        $products = Product::all();
        $brands = Brand::all();
        foreach ($products as $p) {
            $slug = \Illuminate\Support\Str::slug($p->__get("product_name"));
            $p->slug = $slug = $slug . $p->__get("id");
            $p->save();
//$p->update(["slug"=>$slug.$p->__get("id");
        }
        foreach ($categories as $p) {
            $slug = \Illuminate\Support\Str::slug($p->__get("category_name"));
            $p->slug = $slug = $slug . $p->__get("id");
            $p->save();
//$p->update(["slug"=>$slug.$p->__get("id");
        }
        $featureds = Product::orderBy("updated_at", "DESC")->limit(8)->get();
        $lastest_1 = Product::orderBy("created_at", "DESC")->limit(3)->get();
        $lastest_2 = Product::orderBy("created_at", "DESC")->offset(3)->limit(3)->get();
        return view('frontend.home', [
            "woman" => $woman,
            "man" => $man,
            "bag" => $bag,
            "shoes" => $shoes,
            "watches" => $watches,
            "categories" => $categories,
            "most_views" => $most_views,
            "featureds" => $featureds,
            "lastest_1" => $lastest_1,
            "lastest_2" => $lastest_2,
        ]);
    }

    public function category(Category $category)
    {
        $products = $category->Products()->paginate(12);
        $category = Category::all();
        $woman = Product::with("Category")->with("Brand")->where("category_id", "=", "2")->get();
        $man = Product::with("Category")->with("Brand")->where("category_id", "=", "1")->get();
        $shoes = Product::with("Category")->with("Brand")->where("category_id", "=", "5")->get();
        $bag = Product::with("Category")->with("Brand")->where("category_id", "=", "4")->get();
        $watches = Product::with("Category")->with("Brand")->where("category_id", "=", "6")->get();

        return view("frontend.category", [
            "woman" => $woman,
            "man" => $man,
            "bag" => $bag,
            "shoes" => $shoes,
            "watches" => $watches,
            "category" => $category,
            "products" => $products,
        ]);
    }

    public function product(Product $product)
    {
        if (!session()->has("view_count_{$product->__get("id")}")) {
            $product->increment("view_count");
            session(["view_count_{$product->__get("id")}" => true]);
        }
        return view("frontend.product", [
            'product' => $product
        ]);
    }

    public function addToCart(Product $product, Request $request)
    {
        $qty = $request->has("qty") && (int)$request->get("qty") > 0 ? (int)$request->get("qty") : 1;
        $myCart = session()->has("my_cart") && is_array(session("my_cart")) ? session("my_cart") : [];
        $contain = false;
        if (Auth::check()) {
            if (Cart::where("user_id", Auth::id())->where("is_checkout", true)->exists()) {
                $cart = Cart::where("user_id", Auth::id())->where("is_checkout", true)->first();
            } else {
                $cart = Cart::create([
                    "user_id" => Auth::id(),
                    "is_checkout" => true
                ]);
            }
        }
        foreach ($myCart as $key => $item) {
            if ($item["product_id"] == $product->__get("id")) {
                $item["qty"] += $qty;
                $myCart[$key]["qty"] += $qty;
                $contain = true;
                if (Auth::check()) {
                    DB::table("cart_product")->where("cart_id", $cart->__get("id"))
                        ->where("product_id", $item["product_id"])
                        ->update(["qty" => $myCart[$key]["qty"]]);
                }
                break;
            }
        }
        if (!$contain) {
            $myCart[] = [
                "product_id" => $product->__get("id"),
                "qty" => $qty
            ];
        }
        if (Auth::check()) {
            DB::table("cart_product")->insert([
                "qty" => $qty,
                "cart_id" => $cart->__get("id"),
                "product_id" => $product->__get("id")
            ]);
        }
        session(["my_cart" => $myCart]);
        return redirect()->to("/shopping-cart");
    }

    public function shoppingCart()
    {
        $myCart = session()->has("my_cart") && is_array(session("my_cart")) ? session("my_cart") : [];
        $productIds = [];
        foreach ($myCart as $item) {
            $productIds[] = $item["product_id"];
        }
        $grandTotal = 0;
        $products = Product::find($productIds);
        foreach ($products as $p) {
            foreach ($myCart as $item) {
                if ($p->__get("id") == $item["product_id"]) {
                    $grandTotal += ($p->__get("price") * $item["qty"]);
                    $p->cart_qty = $item["qty"];
// dd($p);
                }
            }
        }
// dd($products);
        return view("frontend.cart", [
            "products" => $products,
            "grandTotal" => $grandTotal,
        ]);
    }

    public function checkout()
    {
        $cart = Cart::where("user_id", Auth::id())
            ->where("is_checkout", true)
            ->with("getItems")
            ->firstOrFail();
        return view("frontend.checkout", [
            "cart" => $cart
        ]);
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            "username" => "required",
            "address" => "required",
            "telephone" => "required",]);
        $cart = Cart::where("user_id", Auth::id())
            ->where("is_checkout", true)
            ->with("getItems")
            ->firstOrFail();
        $grandTotal = 0;
        foreach ($cart->getItems as $item) {
            $grandTotal += $item->pivot->__get("qty") * $item->__get("price");
        }
        try {
            $order = Order::create([
                "user_id" => Auth::id(),
                "username" => $request->get("username"),
                "address" => $request->get("address"),
                "telephone" => $request->get("telephone"),
                "note" => $request->get("note"),
                "grand_total" => $grandTotal,
                "status" => Order::PENDING
            ]);
            foreach ($cart->getItems as $item) {
                DB::table("orders_products")->insert([
                    "order_id" => $order->__get("id"),
                    "product_id" => $item->__get("id"),
                    "price" => $item->__get("price"),
                    "qty" => $item->pivot->__get("qty")
                ]);
            }
            $currentUser = auth()->user();
            Mail::to($currentUser)->send(new SendMail());
            event(new OrderCreated($order));
        } catch (\Exception $exception) {
            $exception->getMessage();
        }
    }

//function Search
    public function postSearch(Request $request)
    {
        $searchProducts = Product::whereRaw('LOWER("product_name") like ?', '%' . strtolower($request->search) . '%')->get();
        return view("frontend.search", [
            "searchProducts" => $searchProducts,
        ]);
    }
}
