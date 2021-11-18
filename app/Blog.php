<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'description',
        'content',
        'image_name',
        'image_path',
        'user_id'
    ];

    /**
     * Blog belongs to Tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tags()
    {
    	// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
    	return $this->belongsToMany('App\Tag', 'blog_tags', 'blog_id', 'tag_id');
    }
}
