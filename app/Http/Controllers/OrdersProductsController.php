<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\OrdersProducts;
use Illuminate\Http\Request;
use App\Order;
use App\product;
class OrdersProductsController extends Controller
{
    public function listOrdersProducts(){
        $ordersProducts=OrdersProducts::pagginate(20);
        return view("ordersproducts.list",[
            "ordersProducts"=>$ordersProducts
        ]);
    }
    public function newOrdersProducts(){
        return view("ordersproducts.new");
    }
}
