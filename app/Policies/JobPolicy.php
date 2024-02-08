<?php

namespace App\Policies;

use App\Models\User;

class JobPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Job $job)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->hasRole('Employer');
    }

    public function update(User $user, Job $job)
    {
        return $user->id === $job->user_id || $user->hasRole('Admin');
    }

    public function delete(User $user, Job $job)
    {
        return $user->id === $job->user_id || $user->hasRole('Admin');
    }
}
