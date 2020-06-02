<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function index(){
        return view("home");
    }
    public function home(){
        $categories=Category::all();
        $products=Product::all();
        return view("frontend.home",[
            "categories"=>$categories,
            "products"=>$products
        ]);
    }
}
