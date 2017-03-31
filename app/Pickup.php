<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pickup extends Model
{
    // select year(created_at) years from pickups group by years;
    public static function years(){
        return static::selectRaw('year(created_at) years')
            ->distinct()
            ->orderBy('years', 'desc')
            ->get()
            ->pluck('years')
            ->toArray();
    }

    public function scopeMonth($query, $year){
        return $this->selectRaw('month(created_at) month')
            ->where('created_at', '>=', Carbon::parse('2017-01-01 00:00:00'))
            ->distinct()
            ->orderBy('month', 'asc')
            ->get()
            ->pluck('month')
            ->toArray();
    }
}
