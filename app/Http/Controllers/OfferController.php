<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offers;
use App\Http\Resources\OfferResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\Interfaces\OfferInterface;

class OfferController extends Controller
{

    private OfferInterface $offerRepository;

    public function __construct(OfferInterface $offerRepository)
    {
        $this->offerRepository = $offerRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $offers = $this->offerRepository->list();
            return OfferResource::collection($offers);
        } catch (\Throwable $ex) {
            return rj(false, $ex->getMessage(), null, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferRequest $request)
    {

            try {
                $offer = $this->offerRepository->create($request->validated());
                return new OfferResource($offer);
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
                $offer = $this->offerRepository->findBySku($sku);
                if ($offer != null) {
                    return new OfferResource($offer);
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
    public function update(OfferRequest $request, string $sku)
    {
        try {
            $offer = $this->offerRepository->update($request->validated(), $sku);
            if ($offer != null) {
                return new OfferResource($offer);
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
            $offer = $this->offerRepository->delete($sku);
            if ($offer != null) {
                return rj(true, 'Kayıt Silindi !',null,200);
            } else {
                return rj(false, 'Kayıt Bulunamadı !',null,404);
            }
        } catch (\Throwable $ex) {
            return rj(false, $ex->getMessage(), null, 500);
        }
    }
}
