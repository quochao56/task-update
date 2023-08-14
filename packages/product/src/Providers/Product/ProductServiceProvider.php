<?php

namespace QH\Product\Providers\Product;

use Illuminate\Support\ServiceProvider;
use QH\Product\Repositories\Product\Element\ProductRepository;
use QH\Product\Repositories\Product\Interface\ProductRepositoryInterface;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductRepositoryInterface::class,ProductRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../../database/migrations/product');

        $this->publishes([
            __DIR__ . '/../../../resources/views/product' => resource_path('views/admin/product'),
        ]);
        $this->publishes([
            __DIR__ . '/../../../public' => public_path('qh/product/'),
        ], 'public');
    }
}
