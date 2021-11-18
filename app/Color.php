<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    /**
     *  The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = ['color', 'name'];

}
