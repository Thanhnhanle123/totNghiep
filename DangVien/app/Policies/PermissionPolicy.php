<?php

namespace App\Policies;

use App\User;
use App\permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\permission  $permission
     * @return mixed
     */
    public function view(User $user)
    {
        //
        return $user->checkPermissionAccess( config('permission.access.list-permission') );
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess( config('permission.access.add-permission') );
        //

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\permission  $permission
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return $user->checkPermissionAccess( config('permission.access.edit-permission') );
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\permission  $permission
     * @return mixed
     */
    public function delete(User $user)
    {
        //
        return $user->checkPermissionAccess( config('permission.access.delete-permission') );
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\permission  $permission
     * @return mixed
     */
    public function restore(User $user)
    {
        //
        return $user->checkPermissionAccess( config('permission.access.edit-role') );
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\permission  $permission
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        //
        return $user->checkPermissionAccess( config('permission.access.edit-role') );
    }
}
