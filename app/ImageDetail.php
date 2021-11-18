<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageDetail extends Model
{
    /**
     *  The table associated with the model.
     *  @var string
     */
    protected $table = 'image_details';
    /**
     *  The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = ['product_id','image_detail_path','image_detail_name'];

}
