<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function listOrder(){
        $orders=Order::with("User")->paginate(20);
        return view("order.list",["orders"=>$orders]);
    }
    public function newOrder(){
        $users=User::all();
        return view("order.new",["users"=>$users]);
    }
    public function saveOrder(Request $request){
        $request->validate([
            "user_id"=>"required",
            "grand_total"=>"required|numeric"
        ]);
        try {

            Order::create([
                "user_id" => $request->get("user_id"),
                "grand_total"=>$request->get("grand_total")
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("admin/list-order");
    }
    public function editOrder($id){
        $order = Order::findOrFail($id);
        $user=User::all();
        return view("order.edit",["order"=>$order,"users"=>$user]);
    }
    public function updateOrder($id,Request $request){
        $order = Order::findOrFail($id);
        $request->validate([
            "user_id" => "required",
            "grand_total"
        ]);

        try {
            $order->update([
                "user_id"=>$request->get("user_id"),
               "grand_total"=>$request->get("grand_total")
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("admin/list-order");
    }
    public function deleteOrder($id){
        $order = Order::findOrfail($id);
        try {
            $order->delete();
        }catch (\Exception $exception){

        }
        return redirect()->to("admin/list-order");
    }

}
