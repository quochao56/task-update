<?php

namespace QH\Core\Providers\Core;

use Illuminate\Support\ServiceProvider;
use QH\Core\Base\Repository\BaseRepository;
use QH\Core\Base\Repository\RepositoryInterface;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->app->singleton(BaseRepository::class, RepositoryInterface::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
