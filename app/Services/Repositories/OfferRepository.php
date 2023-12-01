<?php

namespace App\Services\Repositories;

use App\Models\Offers;
use App\Services\Interfaces\OfferInterface;

class OfferRepository implements OfferInterface
{
    public function list()
    {
        return Offers::paginate(50);
    }

    public function findBySku(string $sku)
    {
        return Offers::where('offerSku', $sku)->first();
    }

    public function create(array $details)
    {
        return Offers::create($details);
    }

    public function update(array $details,string $sku )
    {
        return Offers::query()->where('offerSku', $sku)->update($details);
    }

    public function delete(string $sku)
    {
        return Offers::query()->where('offerSku', $sku)->first()->delete();
    }

}
