<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;


    protected $table = 'offers';

    protected $fillable = [
        'offerSku',
        'productSku',
        'price',
        'sellerSku',
        'condition',
        'availability'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'productSku', 'productSku');
    }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'offerSku', 'offerSku');
    }

}
