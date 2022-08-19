<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public function order_detail()
    {
        return $this->belongsTo(order_detail::class);
    }
}
