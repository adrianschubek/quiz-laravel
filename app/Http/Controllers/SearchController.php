<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('search', [
            "query" => $request->input('q')
        ]);
    }
}
