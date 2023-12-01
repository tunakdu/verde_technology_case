<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'orderSku',
        'offerSku',
        'quantity',
        'orderDate',
    ];

    public function offer()
    {
        return $this->belongsTo(Offers::class, 'offerSku', 'offerSku');
    }


}
