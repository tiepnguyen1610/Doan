<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $guarded = []; 

    /**
      * Permission has many PermissionChildren.
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
      public function permissionChildrent()
      {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = permission_id, localKey = id)
       	return $this->hasMany(Permission::class, 'parent_id');
      }
    /**
     * Permission belongs to Parent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
      // belongsTo(RelatedModel, foreignKey = parent_id, keyOnRelatedModel = id)
      return $this->belongsTo(Permission::class, 'parent_id');
    }



}
