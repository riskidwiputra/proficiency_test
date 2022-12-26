<?php

namespace App\Providers;

use App\Modules\inventories\Interfaces\InventoriesRepositoryInterface;
use App\Modules\inventories\Interfaces\InventoriesServiceInterface;
use App\Modules\inventories\Repositories\InventoriesRepository;
use App\Modules\inventories\Services\InventoriesService;
use Illuminate\Support\ServiceProvider;

class InventoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(InventoriesServiceInterface::class,InventoriesService::class);
        $this->app->bind(InventoriesRepositoryInterface::class,InventoriesRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
