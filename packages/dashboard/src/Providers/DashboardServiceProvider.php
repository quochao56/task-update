<?php

namespace QH\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__ . '/../resources/views/','dashboard');
        $this->publishes([
            __DIR__ . '/../resources/views/' => resource_path('views/'),
        ]);
        $this->publishes([
            __DIR__ . '/../public' => public_path('qh/dashboard/'),
        ], 'public');
    }
}
