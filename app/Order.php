<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = ['*'];

    const STATUS_DEFAULT = 0;
    const STATUS_DONE = 1;
    const STATUS_CANCEL = 2;
}
