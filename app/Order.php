<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected  $table="orders";
    public $fillable=[
        "user_id",
        "grand_total"
    ];
    public function User(){
        return $this->belongsTo("\App\User","user_id");//trả về 1 object
    }

}
