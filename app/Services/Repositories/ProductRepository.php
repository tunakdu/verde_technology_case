<?php

namespace App\Services\Repositories;

use App\Models\Products;
use App\Services\Interfaces\ProductInterface;

class ProductRepository implements ProductInterface
{
    public function list()
    {
        return Products::paginate(50);
    }

    public function findBySku(string $sku)
    {
        return Products::where('productSku', $sku)->first();
    }

    public function create(array $details)
    {
        return Products::create($details);
    }

    public function update(array $details, string $sku )
    {

        return Products::query()->where('productSku', $sku)->update($details);
    }

    public function delete(string $sku)
    {
        return Products::query()->where('productSku', $sku)->first()->delete();
    }

}
