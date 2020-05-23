<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listCategory(){
        $categories=Category::paginate(1);
        // show with condition: start from D
        //$categories = category::where("category_name","LIKE","D%")->get();
        // dd($categories);
        return view("category.list", [
            "categories" => $categories
        ]);
    }
}
