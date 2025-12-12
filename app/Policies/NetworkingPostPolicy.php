<?php

namespace App\Policies;

use App\Models\NetworkingPost;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NetworkingPostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Anyone can view posts
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, NetworkingPost $networkingPost): bool
    {
        return true; // Anyone can view individual posts
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Authenticated users can create posts
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, NetworkingPost $networkingPost): bool
    {
        return $user->id === $networkingPost->user_id; // Only the author can update
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, NetworkingPost $networkingPost): bool
    {
        return $user->id === $networkingPost->user_id; // Only the author can delete
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, NetworkingPost $networkingPost): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, NetworkingPost $networkingPost): bool
    {
        return false;
    }
}
