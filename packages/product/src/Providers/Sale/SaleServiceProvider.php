<?php

namespace QH\Product\Providers\Sale;

use Illuminate\Support\ServiceProvider;
use QH\Product\Repositories\Sale\Element\SaleRepository;
use QH\Product\Repositories\Sale\Interface\SaleRepositoryInterface;

class SaleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SaleRepositoryInterface::class,SaleRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../../database/migrations/sale');

        $this->publishes([
            __DIR__ . '/../../../resources/views/sale' => resource_path('views/admin/sale'),
        ]);
    }
}
