<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = "brands";
    public $fillable = [
        "brands_name"
    ];

    public function __get($key)
    {
      if (is_null($this->__get($key)))
          return "default value";
      return $this->__get($key);
    }
}
