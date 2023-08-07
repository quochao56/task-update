<?php

namespace QH\Product\Providers\Category;

use Illuminate\Support\ServiceProvider;
use QH\Product\Http\Controllers\Category\CategoryController;

class CategorySeviceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryController::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/', 'product');
    }
}
