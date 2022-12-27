<?php

namespace App\Providers;

use App\Modules\products\Interfaces\ProductsRepositoryInterface;
use App\Modules\products\Interfaces\ProductsServiceInterface;
use App\Modules\products\Repositories\ProductsRepository;
use App\Modules\variants\Repositories\VariantsRepository;
use App\Modules\products\Services\ProductsService as ServicesProductsService;
use App\Modules\variants\Services\VariantsService;
use App\Modules\variants\Interfaces\VariantsRepositoryInterface;
use App\Modules\variants\Interfaces\VariantsServiceInterface;
use Illuminate\Support\ServiceProvider;

class ProductsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductsServiceInterface::class,ServicesProductsService::class);
        $this->app->bind(ProductsRepositoryInterface::class,ProductsRepository::class);
        $this->app->bind(VariantsRepositoryInterface::class,VariantsRepository::class);
        $this->app->bind(VariantsServiceInterface::class,VariantsService::class);
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
