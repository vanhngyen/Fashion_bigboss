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
}
