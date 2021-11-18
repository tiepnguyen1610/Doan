<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /**
     *  The table associated with the model.
     *  @var string
     */
    protected $table = 'providers';

    /**
     *  The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable =['name','address','phone'];
    
    public function product()
    {
    	return $this->hasMany('App\Product');
    }
}
