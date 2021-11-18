<?php

namespace App\Policies;

use App\Provider;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProviderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any providers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the provider.
     *
     * @param  \App\User  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess('list_provider');
    }

    /**
     * Determine whether the user can create providers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess('add_provider');
    }

    /**
     * Determine whether the user can update the provider.
     *
     * @param  \App\User  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit_provider');
    }

    /**
     * Determine whether the user can delete the provider.
     *
     * @param  \App\User  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete_provider');
    }

    /**
     * Determine whether the user can restore the provider.
     *
     * @param  \App\User  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function restore(User $user, Provider $provider)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the provider.
     *
     * @param  \App\User  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function forceDelete(User $user, Provider $provider)
    {
        //
    }
}
