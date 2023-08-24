<?php

namespace QH\Warehouse\Providers\History;

use Illuminate\Support\ServiceProvider;
use QH\Warehouse\Repositories\History\Elements\HistoryRepository;
use QH\Warehouse\Repositories\History\Interfaces\HistoryRepositoryInterface;

class HistoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(HistoryRepositoryInterface::class, HistoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../../resources/views/history','history');
        $this->publishes([
            __DIR__ . '/../../../resources/views' => resource_path('views/admin/history'),
        ]);
    }
}
