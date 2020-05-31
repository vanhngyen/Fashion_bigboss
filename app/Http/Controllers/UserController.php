<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function list(){
        $users=User::paginate(20);
        return view("user.list",["users"=>$users]);
    }
    public function login(){
        return view("user.login");
    }
    public function register(){
        return view("user.register");
    }
    public function forgotPassword(){
        return view("user.forgotPassword");
    }
    public function saveUser(Request $request){
        $request->validate([
            "name"=>"required|string",
            "email"=>"required|string",
            "password"=>"required|string|min:5",
        ]);
        try{
            User::create([
                "name"=>$request->get("name"),
                "email"=>$request->get("email"),
                "password"=>$request->get("password"),
            ]);

        }catch (\Exception $exception){
            return redirect()->back();

        }
        return redirect()->to("admin/list-user");
    }
}
