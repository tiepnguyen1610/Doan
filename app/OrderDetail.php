<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $guarded = ['*'];
    /**
     * OrderDetail belongs to Product .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
    	// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
    	return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * OrderDetail belongs to Size.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sizes()
    {
        // belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
        return $this->belongsTo(Size::class, 'id_size');
    }

    /**
     * OrderDetail belongs to Color.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function colors()
    {
        // belongsTo(RelatedModel, foreignKey = color_id, keyOnRelatedModel = id)
        return $this->belongsTo(Color::class,'id_color');
    }
}
