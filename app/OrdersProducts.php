<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersProducts extends Model
{
    protected  $table="orders_products";
    public $fillable=[
        "order_id",
        "product_id",
        "qty",
        "price"
    ];
}
