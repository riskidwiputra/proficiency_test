<?php

namespace App\Providers;

use App\Modules\sales\Services\SalesService;
use App\Modules\merchants\Repositories\MerchantsRepository;
use App\Modules\merchants\Interfaces\MerchantsRepositoryInterface;
use App\Modules\orders\Interfaces\OrdersRepositoryInterface;
use App\Modules\orders\Repositories\OrdersRepository;
use App\Modules\sales\Interfaces\SalesRepositoryInterface;
use App\Modules\sales\Interfaces\SalesServiceInterface;
use App\Modules\sales\Repositories\SalesRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MerchantsRepositoryInterface::class,MerchantsRepository::class);
        $this->app->bind(SalesServiceInterface::class,SalesService::class);
        $this->app->bind(SalesRepositoryInterface::class,SalesRepository::class);
        $this->app->bind(OrdersRepositoryInterface::class,OrdersRepository::class);

        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
