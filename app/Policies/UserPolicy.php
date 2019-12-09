<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $profile
     * @return mixed
     */
    public function viewAny(User $profile)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param User $profile
     * @return mixed
     */
    public function view(?User $user, User $profile)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param User $profile
     * @return mixed
     */
    public function update(User $user, User $profile)
    {
        return $user->id === $profile->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param User $profile
     * @return mixed
     */
    public function delete(User $user, User $profile)
    {
        return $user->id === $profile->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param User $profile
     * @return mixed
     */
    public function restore(User $user, User $profile)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param User $profile
     * @return mixed
     */
    public function forceDelete(User $user, User $profile)
    {
        return false;
    }
}
