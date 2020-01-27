<?php

namespace App\Policies;

use App\Question;
use App\Quiz;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create questions.
     *
     * @param User $user
     * @param Quiz $quiz
     * @return mixed
     */
    public function create(User $user, Quiz $quiz)
    {
        return $user === $quiz->user;
    }
}
