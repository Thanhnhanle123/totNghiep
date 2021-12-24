<?php

namespace App\Policies;

use App\Dantoc;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DanTocPolicy
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
     * @param  \App\Dantoc  $dantoc
     * @return mixed
     */
    public function view(User $user)
    {
        //
        return $user->checkPermissionAccess( config('permission.access.list-dantoc') );
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->checkPermissionAccess( config('permission.access.add-dantoc') );
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Dantoc  $dantoc
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return $user->checkPermissionAccess( config('permission.access.edit-dantoc') );
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Dantoc  $dantoc
     * @return mixed
     */
    public function delete(User $user)
    {
        //
        return $user->checkPermissionAccess( config('permission.access.delete-dantoc') );
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Dantoc  $dantoc
     * @return mixed
     */
    public function upload(User $user)
    {
        return $user->checkPermissionAccess( config('permission.access.upload-dantoc') );
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Dantoc  $dantoc
     * @return mixed
     */
    public function restore(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Dantoc  $dantoc
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        //
    }
}
