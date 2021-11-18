<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
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

    /**
     * User belongs to many (many-to-many) Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        // belongsToMany(RelatedModel, pivotTable, thisKeyOnPivot = user_id, otherKeyOnPivot = role_id)
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function checkPermissionAccess($permissionCheck)
    {
        //Lấy được tất cả các quyền của user đang login vào hệ thống
        $roles = auth()->user()->roles;
        //dd($roles);
        
        foreach($roles as $role) {
            $permissions = $role->permissions;

            //So sánh giá trị đưa vào của route hiện tại xem có tồn tại trong các quyền mà mình lấy được hay không
            if($permissions->contains('key_code', $permissionCheck)) {
                return true;
            }
            
        }
        return false;
    }

}
