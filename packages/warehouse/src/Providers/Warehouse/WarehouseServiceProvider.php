<?php

namespace QH\Warehouse\Providers\Warehouse;

use Illuminate\Support\ServiceProvider;
use QH\Warehouse\Repositories\Warehouse\Elements\WarehouseRepository;
use QH\Warehouse\Repositories\Warehouse\Interfaces\WarehouseRepositoryInterface;

class WarehouseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(WarehouseRepositoryInterface::class, WarehouseRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../../database/migrations');
    }
}
