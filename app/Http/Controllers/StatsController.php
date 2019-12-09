<?php

namespace App\Http\Controllers;

use App\Like;
use App\Question;
use App\Quiz;
use App\Support\Traits\FormatsNumbers;
use App\User;

class StatsController extends Controller
{
    use FormatsNumbers;

    public function __invoke()
    {
        return view('stats.index', [
            'quiz' => $this->numformat(Quiz::count()),
            'question' => $this->numformat(Question::count()),
            'plays' => $this->numformat(Quiz::pluck('play_count')->sum()),
            'like' => $this->numformat(Like::count()),
            'user' => $this->numformat(User::count())
        ]);
    }
}
