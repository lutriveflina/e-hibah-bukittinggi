<?php

namespace App\Policies;

use App\Models\Lembaga;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LembagaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('View Any Lembaga');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->hasPermissionTo('View Lembaga');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('Create Lembaga') && $user->lembaga();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Lembaga $lembaga): bool
    {
        return $user->hasPermissionTo('Update Lembaga');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Lembaga $lembaga): bool
    {
        return $user->hasPermissionTo('Delete Lembaga');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Lembaga $lembaga): bool
    {
        return $user->hasPermissionTo('Restore Lembaga');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Lembaga $lembaga): bool
    {
        return false;
    }
}
