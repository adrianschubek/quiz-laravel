<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Controllers\Controller;
use App\Quiz;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Query\Builder;
use Illuminate\View\View;

class QuizLikedByController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Handle the incoming request.
     *
     * @param Quiz $quiz
     * @return Factory|View
     */
    public function __invoke(Quiz $quiz)
    {
        $users = User::whereIn('id',
            fn(Builder $builder) => $builder
                ->select('user_id')
                ->from('likes')
                ->where('likeable_id', $quiz->id)
                ->where('likeable_type', Quiz::class)
        )->orderBy('name', 'asc')->paginate(16);

        return view('quiz.likes.show', compact('quiz', 'users'));
    }
}
