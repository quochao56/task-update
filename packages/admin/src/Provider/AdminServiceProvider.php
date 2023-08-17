<?php

namespace QH\Admin\Provider;

use Illuminate\Support\ServiceProvider;
use QH\Admin\Http\Controllers\AdminController;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AdminController::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'admin/login');
        $this->publishes([
            __DIR__ . '/../../resources/views/' => resource_path('views/admin/login'),
        ]);
    }
}
