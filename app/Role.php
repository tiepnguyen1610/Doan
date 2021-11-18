<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $guarded = [];

    /**
     * Role has many Role_user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function role_user()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = role_id, localKey = id)
    	return $this->hasMany(RoleUser::class);
    }

    /**
     * Role belongs to Permission.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permissions()
    {
        // belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }
}
