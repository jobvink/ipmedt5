<?php

namespace App;

use App\Rack;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['id', 'size', 'stock'];


    public function racks()
    {
        return $this->hasMany(Rack::class);
    }
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
