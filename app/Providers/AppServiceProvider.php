<?php

namespace App\Providers;

use App\Models\RideRequest;
use App\Repositories\Map\MapRepository;
use App\Repositories\Map\MapRepositoryInterface;
use App\Repositories\RideRequest\RideRequestRepositoryInterface;
use App\Repositories\Stop\StopRepository;
use App\Repositories\Stop\StopRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        // $this->app->bind(MapRepositoryInterface::class, MapRepository::class);
        // $this->app->bind(RideRequestRepositoryInterface::class, RideRequest::class);
        $this->app->bind(StopRepositoryInterface::class, StopRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
