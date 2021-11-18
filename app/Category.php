<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     *  The table associated with the model.
     *  @var string
     */
    protected $table = 'categories';

    /**
     *  The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = [
    	'cat_name',
    	'parent_id',
        'slug'
    ];

    /**
     *  One Category with many products
     */
    public function product()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * Category belongs to .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        // belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function categoryChild()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }       
}
