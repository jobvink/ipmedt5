<?php

namespace App;

use App\Rack;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function racks()
    {
        return $this->hasMany(Rack::class);
    }
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
