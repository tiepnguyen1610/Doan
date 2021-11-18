<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';

    /**
     *  The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = ['user_id','role_id'];

    /**
     * RoleUser belongs to Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
    	// belongsTo(RelatedModel, foreignKey = ro_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Role::class,'role_id');
    }

    /**
     * RoleUser belongs to User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
    	// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
    	return $this->belongsTo(User::class,'user_id');
    }
}
