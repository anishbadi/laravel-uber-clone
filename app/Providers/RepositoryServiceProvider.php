<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Interfaces\CustomerRepositoryInterface;
use App\Repository\Interfaces\LocationRepositoryInterface;
use App\Repository\Interfaces\TripRepositoryInterface;
use App\Repository\CustomerRepository;
use App\Repository\LocationRepository;
use App\Repository\TripRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CustomerRepositoryInterface::class,CustomerRepository::class);
        $this->app->bind(LocationRepositoryInterface::class,LocationRepository::class);
        $this->app->bind(TripRepositoryInterface::class,TripRepository::class);
    }
}
