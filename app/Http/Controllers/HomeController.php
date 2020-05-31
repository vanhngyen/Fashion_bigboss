<?php

namespace App\Http\Controllers;

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
        $categories=Category::orderBy("created_at","ASC")->get();
        $featureds=Product::orderBy("updated_at","DESC")->limit(8)->get();
        $lastest_1=Product::orderBy("created_at","DESC")->limit(3)->get();
        $lastest_2=Product::orderBy("created_at","DESC")->offset(3)->limit(3)->get();
        return view('frontend.home',[
            "categories"=>$categories,
            "featureds"=>$featureds,
            "lastest_1"=>$lastest_1,
            "lastest_2"=>$lastest_2,
        ]);
    }
}
