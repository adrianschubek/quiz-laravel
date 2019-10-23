<?php

namespace App\Http\Controllers\Likes;

use App\Like;
use App\Quiz;
use App\Http\Controllers\Controller;

class LikeQuizController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function __invoke(Quiz $quiz)
    {
        $this->authorize('like', $quiz);

        $like = new Like();
        $like->user()->associate(auth()->user());

        $quiz->likes()->save($like);

        return back()->with('ok', 'Du magst dieses Quiz.');
    }
}
