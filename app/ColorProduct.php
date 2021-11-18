<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    protected $table = 'color_products';

    /**
     *  The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = ['product_id','color_id'];

}
