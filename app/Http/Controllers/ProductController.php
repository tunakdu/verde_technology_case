<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\Interfaces\ProductInterface;


class ProductController extends Controller
{

    private ProductInterface $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = $this->productRepository->list();
            return ProductResource::collection($products);
        } catch (\Throwable $ex) {
            return rj(false, $ex->getMessage(), null, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        try {
            $validated = $request->validated();
            $product = $this->productRepository->create($validated);
            return new ProductResource($product);
        } catch (\Throwable $ex) {
            return rj(false, $ex->getMessage(), null, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $sku)
    {

        try {
            $product = $this->productRepository->findBySku($sku);
            if ($product != null) {
                return new ProductResource($product);
            } else {
                return rj(false, 'Kayıt Bulunamadı !', null, 404);
            }
        } catch (\Throwable $ex) {
            return rj(false, $ex->getMessage(), null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $sku)
    {
        try {
            $validated = $request->validated();
            $product = $this->productRepository->update($validated,$sku);
            if ($product != null) {
                return new ProductResource($product);
            } else {
                return rj(false, 'Kayıt Bulunamadı !', null, 404);
            }
        } catch (\Throwable $ex) {
            return rj(false, $ex->getMessage(), null, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $sku)
    {
        try {
            $product = $this->productRepository->delete($sku);
            if ($product) {
                return rj(true, 'Kayıt Silindi !');
            } else {
                return rj(false, 'Kayıt Bulunamadı !', null, 404);
            }
        } catch (\Throwable $ex) {
            return rj(false, $ex->getMessage(), null, 500);
        }
    }
}
