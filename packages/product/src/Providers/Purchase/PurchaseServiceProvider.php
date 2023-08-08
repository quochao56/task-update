<?php

namespace QH\Product\Providers\Purchase;

use Illuminate\Support\ServiceProvider;
use QH\Product\Repository\Purchase\Element\PurchaseRepository;
use QH\Product\Repository\Purchase\Interface\PurchaseRepositoryInterface;

class PurchaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PurchaseRepositoryInterface::class,PurchaseRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/purchase');

        $this->publishes([
            __DIR__ . '/../../resources/views/purchase' => resource_path('views/admin/purchase'),
        ]);
    }
}
