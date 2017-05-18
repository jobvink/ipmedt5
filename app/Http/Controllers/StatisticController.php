<?php

namespace App\Http\Controllers;


use App\Statistics;

class StatisticController extends Controller
{
    public function show()
    {
        return view('statistics.show');
    }
}