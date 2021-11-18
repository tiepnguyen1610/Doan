<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     *  The table associated with the model.
     *  @var string
     */
    protected $table = 'products';
    /**
     *  The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = [
    	'pro_name',
    	'cat_id',
    	'quanty',
    	'image_name',
        'image_path',
    	'sale_price',
    	'promotional_price',
    	'description',
    	'content',
    	'user_id',
    	'provider_id'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Category','cat_id');
    }

     public function provider()
    {
        return $this->belongsTo('App\Provider','provider_id');
    }

    public function images()
    {
        return $this->hasMany('App\ImageDetail','product_id');
    }

    public function orderdetail()
    {
        return $this->hasMany('App\OrderDetail');
    }

    /**
     * Product belongs to Color .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productcolors()
    {
        // belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
        return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
    }

    /**
     * Product belongs to Size .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productsizes()
    {
        // belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
        return $this->belongsToMany(Size::class,'size_products', 'product_id', 'size_id');
    }

}
