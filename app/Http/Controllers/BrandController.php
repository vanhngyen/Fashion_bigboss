<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function listBrand(){
        $brands = Brand::all();
        return view("brand.list",[
            "brands"=>$brands
        ]);
    }

    public function newBrand(){
        return view("/brand.new");
    }

    public function saveBrand(Request $request){
        $request->validate([
            "brands_name"=>"required|string|min:6|unique:brands"
        ]);

        try {
            Brand::create([
                "brands_name"=>$request->get("brands_name"),
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/list-brand");
    }

    public function editBrand($id){
        $brand = Brand::findOrFail($id);
        return view("brand.edit",["brand"=>$brand]);
    }

    public function updateBrand($id,Request $request){
        $brand = Brand::findOrFail($id);
        $request->validate([
            "brands_name"=>"required|min:6|unique:brands,brands_name,{$id}"
        ]);
        try{
            $brand->update([
                "brands_name"=>$request->get("brands_name")
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/list-brand");
    }

    public function deleteBrand($id){
        $brand = Brand::findOrFail($id);
        try {
            $brand->delete();
        }catch (\Exception $exception){

        }
        return redirect()->to("/list-brand");
    }

}
