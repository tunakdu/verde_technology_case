<?php

namespace App\Services\Interfaces;

interface ProductInterface
{
    public function list();
    public function findBySku(string $sku);
    public function create(array $details);
    public function update(array $details,string $sku);
    public function delete(string $sku);
}
