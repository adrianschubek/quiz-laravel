<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Database\Query\Builder;

class LikedQuizController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function __invoke()
    {
        $quizzes = Quiz::whereIn('id',
            fn(Builder $query) => $query->from('likes')->select('likeable_id')->where('user_id', auth()->user()->id)
        )->paginate(15);

        return view('likes.index', compact('quizzes'));
    }
}
