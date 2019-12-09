<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Query\Builder;
use Illuminate\View\View;

class QuizLikedByController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Quiz $quiz
     * @return Factory|View
     */
    public function __invoke(Quiz $quiz)
    {
        $users = User::whereIn('id',
            fn(Builder $builder) => $builder->select('user_id')
                ->from('likes')
                ->where('likeable_id', $quiz->id)
                ->where('likeable_type', Quiz::class)
        )->orderBy('name', 'asc')->paginate(16);

        return view('quiz.likes.show', compact('quiz', 'users'));
    }
}
