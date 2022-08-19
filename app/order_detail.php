<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    protected $table = 'order_detail';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
