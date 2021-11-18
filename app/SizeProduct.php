<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizeProduct extends Model
{
    protected $table = 'size_products';

    /**
     *  The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = ['product_id','size_id'];

}
