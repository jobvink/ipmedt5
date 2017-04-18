<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Rack extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'description'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count');
    }

    public function incrementCount($barcode){
        return $this->products()
            ->updateExistingPivot($barcode, ['count' => $this->products()
                    ->where('product_id', $barcode)
                    ->get()
                    ->first()
                    ->pivot->count + 1]);
    }

    public function decrementCount($barcode){
        return $this->products()
            ->updateExistingPivot($barcode, ['count' => $this->products()
                    ->where('product_id', $barcode)
                    ->get()
                    ->first()
                    ->pivot->count - 1]);
    }

    public function count($barcode){
        return $this->products()
            ->where('products.id', $barcode)
            ->get()
            ->first()
            ->pivot->count;
    }
}
