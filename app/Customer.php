<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable = [
        'address', 'kelurahan', 'kecamatan', 'kota', 'provinsi', 'kode_pos'
    ];
}
