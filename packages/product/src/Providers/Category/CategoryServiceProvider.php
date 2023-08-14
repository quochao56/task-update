<?php

namespace QH\Product\Providers\Category;

use Illuminate\Support\ServiceProvider;
use QH\Product\Repositories\Category\Element\CategoryRepository;
use QH\Product\Repositories\Category\Interface\CategoryRepositoryInterface;


class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
//        $this->app->bind(CategoryController::class);
        $this->app->singleton(CategoryRepositoryInterface::class,CategoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../../resources/views/', 'product');
        $this->loadMigrationsFrom(__DIR__ . '/../../../database/migrations/category');

        $this->publishes([
            __DIR__ . '/../../../resources/views/category' => resource_path('views/admin/category'),
        ]);
    }
}
