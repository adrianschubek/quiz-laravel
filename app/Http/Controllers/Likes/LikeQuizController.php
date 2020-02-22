<?php

namespace App\Http\Controllers\Likes;

use App\Http\Controllers\Controller;
use App\Like;
use App\Notifications\QuizLiked;
use App\Quiz;

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

        $quiz->user->notify(new QuizLiked($quiz, auth()->user()));

        return back()->with('ok', 'Du magst dieses Quiz.');
    }
}
