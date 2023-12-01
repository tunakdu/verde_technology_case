<?php

namespace App\Providers;

use App\Services\Interfaces\ProductInterface;
use App\Services\Repositories\ProductRepository;
use App\Services\Interfaces\OfferInterface;
use App\Services\Repositories\OfferRepository;
use App\Services\Interfaces\OrderInterface;
use App\Services\Repositories\OrderRepository;
use Illuminate\Support\ServiceProvider;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        app()->bind(ProductInterface::class, ProductRepository::class);
        app()->bind(OfferInterface::class, OfferRepository::class);
        app()->bind(OrderInterface::class, OrderRepository::class);

    }
}
