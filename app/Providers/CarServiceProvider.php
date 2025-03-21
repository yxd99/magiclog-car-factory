<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\CarRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\CarRepository;

class CarServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);
    }
}