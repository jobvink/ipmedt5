<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['id', 'name', 'description'];

    //
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($article) {
            $article->products()->delete();
        });
    }
}
