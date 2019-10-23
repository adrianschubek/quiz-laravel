<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function __invoke()
    {
        return view('stats.index');
    }
}
