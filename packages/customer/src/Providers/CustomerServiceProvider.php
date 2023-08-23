<?php

namespace QH\Customer\Providers;

use Illuminate\Support\ServiceProvider;
use QH\Customer\Repositories\Elements\CartRepository;
use QH\Customer\Repositories\Elements\ShopRepository;
use QH\Customer\Repositories\Interfaces\CartRepositoryInterface;
use QH\Customer\Repositories\Interfaces\ShopRepositoryInterface;

class CustomerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ShopRepositoryInterface::class, ShopRepository::class);
        $this->app->singleton(CartRepositoryInterface::class, CartRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
    }
}
