<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'productSku',
        'name',
        'category',
        'price',
    ];


    public function offers()
    {
        return $this->hasMany(Offers::class, 'productSku', 'productSku');
    }

    public function orders()
    {
        return $this->hasManyThrough(Orders::class, Offers::class, 'productSku', 'offerSku', 'productSku', 'offerSku');
    }

}
