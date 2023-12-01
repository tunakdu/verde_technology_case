<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Orders;
use App\Services\Interfaces\OrderInterface;



class OrderController extends Controller
{

    private OrderInterface $orderRepository;

    public function __construct(OrderInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $orders = $this->orderRepository->list();
            return OrderResource::collection($orders);
        } catch (\Throwable $ex) {
            return rj(false, $ex->getMessage(), null, 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        try {
            $order = $this->orderRepository->create($request->validated());
            return new OrderResource($order);
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
            $order = $this->orderRepository->findBySku($sku);
            if ($order != null) {
                return new OrderResource($order);
            } else {
                return rj(false, 'Kayıt Bulunamadı !',null,404);
            }
        } catch (\Throwable $ex) {
            return rj(false, $ex->getMessage(), null, 500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, string $sku)
    {
        try {
            $validated = $request->validated();
            $order = $this->orderRepository->update($validated, $sku);
            if ($order != null) {
                return new OrderResource($order);
            } else {
                return rj(false, 'Kayıt Bulunamadı !',null,404);
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
            $order = $this->orderRepository->delete($sku);
            if ($order != null) {
                return rj(true, 'Kayıt Silindi !',null,200);
            } else {
                return rj(false, 'Kayıt Bulunamadı !',null,404);
            }
        } catch (\Throwable $ex) {
            return rj(false, $ex->getMessage(), null, 500);
        }
    }
}
