<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";

    public $fillable = [
        "product_name",
        "product_image",
        "product_desc",
        "price",
        "qty",
        "category_id",
        "brand_id"
    ];

    public function getImage(){
        if(is_null($this->__get("product_image"))){
            return asset("media/image_defauld.png");
        }
        return asset($this->__get("product_image"));
    }

    public function Category(){
        return $this->belongsTo("\App\Category","category_id");//trả về 1 object
    }

    public function Brand()
    {
        return $this->belongsTo("\App\Brand");
    }
}
