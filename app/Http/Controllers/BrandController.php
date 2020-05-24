<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function listBrand()
    {
        $bands = Brand::paginate(20);
        return view("brands.list", [
            "brands" => $bands
        ]);


    }
    public  function newBrand(){
        return view("brands.new");

    }
    public  function saveBrand(Request $request){
        $request->validate([
           "brand_name"=>"required|string|min:6|unique:brands"
        ]);
        try{
            Brand::create([
                "brand_name"=>$request->get("brand_name")
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/list-brand");
    }

}
