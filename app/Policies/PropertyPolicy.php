<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;

use Illuminate\Auth\Access\Response;

class PropertyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user,Property $property): bool
    {
        return auth()->user()->hasRole("super_admin");
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Property $property):bool
    {
        // return $user->id === $property->user_id ? Response::allow() : Response::deny('You Have No Permission To Update This Post');
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Property $Property): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Property $Property): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Property $property): bool
    {
        return false;
    }
}
