<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Rack extends Model
{
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
