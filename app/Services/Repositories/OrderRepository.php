<?php

namespace App\Services\Repositories;

use App\Models\Orders;
use App\Services\Interfaces\OrderInterface;

class OrderRepository implements OrderInterface
{
    public function list()
    {
        return Orders::paginate(50);
    }

    public function findBySku(string $sku)
    {
        return Orders::where('orderSku', $sku)->first();
    }

    public function create(array $details)
    {
        return Orders::create($details);
    }

    public function update(array $details,string $sku )
    {
        return Orders::query()->where('orderSku', $sku)->update($details);
    }

    public function delete(string $sku)
    {
        return Orders::query()->where('orderSku', $sku)->first()->delete();
    }

}
