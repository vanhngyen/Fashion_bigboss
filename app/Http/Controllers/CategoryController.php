<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listCategory()
    {
        $categories =Category::paginate(20);
        return view("category.list", [
            "categories" => $categories
        ]);

    }

    public function newCategory()
    {
        return view("category.new");
    }
    public function saveCategory(Request $request){
        $request->validate([
            "category_name"=> "required|string|min:2|unique:categories"
        ]);
        try{
            Category::create([
                "category_name"=> $request->get("category_name")
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("admin/list-category");
    }

    public function editCategory($id){
        $category = Category::findOrFail($id);
        return view("category.edit",["category"=>$category]);
    }

    public function updateCategory($id,Request $request){
        $category = Category::findOrFail($id);
        $request->validate([
            "category_name"=> "required|min:6|unique:categories,category_name,{$id}"
        ]);
        try {
            $category->update([
                "category_name"=> $request->get("category_name")
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("admin/list-category");
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        try{
            $category->delete();
        }catch (\Exception $exception){
        }
        return redirect()->to("admin/list-category");
    }
}
