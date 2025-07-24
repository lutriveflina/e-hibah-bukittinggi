<?php

namespace App\Policies;

use App\Models\Skpd;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SkpdPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('View Any Skpd');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Skpd $skpd): bool
    {
        return $user->hasPermissionTo('View Skpd');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('Create Skpd');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Skpd $skpd): bool
    {
        return $user->hasPermissionTo('Update Skpd');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Skpd $skpd): bool
    {
        return $user->hasPermissionTo('Delete Skpd');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Skpd $skpd): bool
    {
        return $user->hasPermissionTo('Restore Skpd');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Skpd $skpd): bool
    {
        return false;
    }
}
