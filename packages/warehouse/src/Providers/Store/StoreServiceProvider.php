<?php

namespace QH\Warehouse\Providers\Store;

use Illuminate\Support\ServiceProvider;
use QH\Warehouse\Repositories\Store\Elements\StoreRepository;
use QH\Warehouse\Repositories\Store\Interfaces\StoreRepositoryInterface;

class StoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(StoreRepositoryInterface::class, StoreRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../../resources/views/store','store');
        $this->publishes([
            __DIR__ . '/../../../resources/views' => resource_path('views/admin/warehouse'),
        ]);
        $this->publishes([
            __DIR__ . '/../../../resources/views' => resource_path('views/admin/history'),
        ]);
    }
}
