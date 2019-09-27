<?php

namespace App\Policies;

use App\Quiz;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuizPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(?User $user, Quiz $quiz)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Quiz $quiz)
    {
        return $user->id === $quiz->user_id;
    }

    public function delete(User $user, Quiz $quiz)
    {
        return $user->id === $quiz->user_id;
    }

    public function restore(User $user, Quiz $quiz)
    {
        return $user->id === $quiz->user_id;
    }

    public function forceDelete(User $user, Quiz $quiz)
    {
        return $user->id === $quiz->user_id;
    }
}
