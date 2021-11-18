<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
     protected $table = 'blog_tags';

    /**
     *  The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = ['blog_id','tag_id'];
}
