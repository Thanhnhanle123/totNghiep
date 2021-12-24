<?php

namespace App\Policies;

use App\DangVien;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DangVienPolicy
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
     * @param  \App\DangVien  $dangVien
     * @return mixed
     */
    public function view(User $user)
    {
        //
        return $user->checkPermissionAccess( config('permission.access.list-dangvien') );
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess( config('permission.access.add-dangvien') );
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\DangVien  $dangVien
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermissionAccess( config('permission.access.edit-dangvien') );
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\DangVien  $dangVien
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess( config('permission.access.delete-dangvien') );
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\DangVien  $dangVien
     * @return mixed
     */
    public function permanently_deleted(User $user)
    {
        return $user->checkPermissionAccess( config('permission.access.permanently-deleted') );
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\DangVien  $dangVien
     * @return mixed
     */
    public function restore(User $user)
    {
        //
        return $user->checkPermissionAccess( config('permission.access.restore-dangvien') );
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\DangVien  $dangVien
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        //
    }
}
