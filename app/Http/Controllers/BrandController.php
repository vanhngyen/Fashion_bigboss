<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function listBrand()
    {
        $brands = Brand::paginate(20);
        return view("brand.list", [
            "brands" => $brands
        ]);


    }
    public  function newBrand(){
        return view("brand.new");

    }
    public  function saveBrand(Request $request){
        $request->validate([
           "brands_name"=>"required|string|min:6|unique:brand"
        ]);
        try{
            Brand::create([
                "brands_name"=>$request->get("brands_name")
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/list-brand");
    }

}
