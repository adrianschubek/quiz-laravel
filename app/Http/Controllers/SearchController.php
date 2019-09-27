<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        return view('search', [
            "query" => $request->input('q')
        ]);
    }
}
