<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\role;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'quantriviens';
    protected $fillable = [
         'userName', 'password','password_show','tenNguoiDung','file_name','file_path'
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(role::class, 'role_user', 'user_id', 'role_id')->withTimestamps();
    }

    public function checkPermissionAccess($permissionCheck)
    {
        $roles = Auth::user()->roles;
        foreach ($roles as $role){
            $permissions = $role->permissions;
            if ($permissions->contains('key_code',$permissionCheck)){
                return true;
            }
        }
        return false;
    }
}
