<?php

namespace App\Providers;

use App\Repositories\ImageRepository;
use App\Repositories\ProductRepository;
use App\Repositories\StoreService;
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
        $this->app->singleton(StoreService::class, function() {
            $productRepo = $this->app->make(ProductRepository::class);
            $imageRepo = $this->app->make(ImageRepository::class);

            $storeService = new StoreService(
                $productRepo,
                $imageRepo
            );

            return $storeService;
        });
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
