<?php

namespace App\Providers;

use App\Repositories\ImageRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ProductRepository::class,  function() {
            $repo = new ProductRepository();
            return $repo;
        });

        $this->app->singleton(ImageRepository::class, function() {
            $repo = new ImageRepository();
            return $repo;
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
