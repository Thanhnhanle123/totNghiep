<?php

namespace App\Policies;

use App\Chucvu;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChucVuPolicy
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
     * @param  \App\Chucvu  $chucvu
     * @return mixed
     */
    public function view(User $user)
    {
        //
        return $user->checkPermissionAccess( config('permission.access.list-chucvu') );
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
        return $user->checkPermissionAccess( config('permission.access.add-chucvu') );
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Chucvu  $chucvu
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return $user->checkPermissionAccess( config('permission.access.edit-chucvu') );
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Chucvu  $chucvu
     * @return mixed
     */
    public function delete(User $user)
    {
        //
        return $user->checkPermissionAccess( config('permission.access.delete-chucvu') );
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Chucvu  $chucvu
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
     * @param  \App\Chucvu  $chucvu
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        //
    }
}
