<?php

namespace App\Http\Controllers;

use App\Quiz;

class HomeController extends Controller
{
    public function __invoke()
    {
        $sort = request('sort') === 'asc'
            ? 'asc' : 'desc';
        $column = request('type') === 'play'
            ? 'play_count' : 'created_at';

        $quizzes = Quiz::withCount('likes')->with('user')->orderBy($column, $sort)->has('questions')->paginate();

        return view('home', compact('quizzes'));
    }
}
