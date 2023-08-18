<?php

namespace QH\Core\Providers\Admin;

use Illuminate\Support\ServiceProvider;
use QH\Core\ACL\Login\Http\Controllers\Admin\AdminController;


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
        $this->loadRoutesFrom(__DIR__ . '/../../../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/admin');
    }
}
