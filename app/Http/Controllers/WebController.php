<?php

namespace App\Http\Controllers;
use App\Category;
use \App\User;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function index(){
        return view("layouts.app");
    }
    public function home(){
        $categories=Category::all();
        return view("frontend.home",[
            "categories"=>$categories,
        ]);
    }
}
