<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $table = "brands";

    public $fillable = [
        "brands_name",
        "brand_image"
    ];
    public function getImage(){
        if(is_null($this->__get("brand_image"))){
            return asset("media/image_defauld.png");
        }
        return asset($this->__get("brand_image"));
    }
}
