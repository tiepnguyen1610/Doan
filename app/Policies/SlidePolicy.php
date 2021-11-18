<?php

namespace App\Policies;

use App\Slide;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SlidePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any slides.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the slide.
     *
     * @param  \App\User  $user
     * @param  \App\Slide  $slide
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess('list_slide');
    }

    /**
     * Determine whether the user can create slides.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess('add_slide');
    }

    /**
     * Determine whether the user can update the slide.
     *
     * @param  \App\User  $user
     * @param  \App\Slide  $slide
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit_slide');
    }

    /**
     * Determine whether the user can delete the slide.
     *
     * @param  \App\User  $user
     * @param  \App\Slide  $slide
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete_slide');
    }

    /**
     * Determine whether the user can restore the slide.
     *
     * @param  \App\User  $user
     * @param  \App\Slide  $slide
     * @return mixed
     */
    public function restore(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the slide.
     *
     * @param  \App\User  $user
     * @param  \App\Slide  $slide
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        //
    }
}
