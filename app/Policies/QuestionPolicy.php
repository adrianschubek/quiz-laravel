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
     * Determine whether the user can view any questions.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the question.
     *
     * @param User $user
     * @param Question $question
     * @return mixed
     */
    public function view(User $user, Question $question)
    {
        //
    }

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

    /**
     * Determine whether the user can update the question.
     *
     * @param User $user
     * @param Question $question
     * @return mixed
     */
    public function update(User $user, Question $question)
    {
        //
    }

    /**
     * Determine whether the user can delete the question.
     *
     * @param User $user
     * @param Question $question
     * @return mixed
     */
    public function delete(User $user, Question $question)
    {
        //
    }

    /**
     * Determine whether the user can restore the question.
     *
     * @param User $user
     * @param Question $question
     * @return mixed
     */
    public function restore(User $user, Question $question)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the question.
     *
     * @param User $user
     * @param Question $question
     * @return mixed
     */
    public function forceDelete(User $user, Question $question)
    {
        //
    }
}
