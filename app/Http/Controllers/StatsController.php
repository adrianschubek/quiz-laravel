<?php

namespace App\Http\Controllers;

use App\Like;
use App\Question;
use App\Quiz;
use App\User;

class StatsController extends Controller
{
    public function __invoke()
    {
        return view('stats.index', [
            'quiz' => $this->format(Quiz::count()),
            'question' => $this->format(Question::count()),
            'like' => $this->format(Like::count()),
            'user' => $this->format(User::count())
        ]);
    }

    private function format($number)
    {
        return number_format($number, 0, ',', '.');
    }
}
