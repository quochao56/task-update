<?php

namespace QH\Blog\Providers;

use Illuminate\Support\ServiceProvider;
use QH\Blog\Repositories\Elements\PostRepository;
use QH\Blog\Repositories\Interface\PostRepositoryInterface;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PostRepositoryInterface::class, PostRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/','blog');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->publishes([
            __DIR__ . '/../../resources/views/admin' => resource_path('views/admin'),
        ]);
        $this->publishes([
            __DIR__ . '/../../resources/views/blog' => resource_path('views/blog'),
        ]);
        $this->publishes([
            __DIR__ . '/../../public' => public_path('qh/blog/'),
        ], 'public');
    }
}
