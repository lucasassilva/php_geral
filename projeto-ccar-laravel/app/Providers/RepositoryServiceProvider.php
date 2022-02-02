<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserSocialRepository::class, \App\Repositories\UserSocialRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ContactUSRepository::class, \App\Repositories\ContactUSRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ContactUSRepository::class, \App\Repositories\ContactUSRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ContactRepository::class, \App\Repositories\ContactRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CarroRepository::class, \App\Repositories\CarroRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CarRepository::class, \App\Repositories\CarRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CarRepository::class, \App\Repositories\CarRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MotorcycleRepository::class, \App\Repositories\MotorcycleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\EquipamentMotorcyclesRepository::class, \App\Repositories\EquipamentMotorcyclesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\EquipMotorcycleRepository::class, \App\Repositories\EquipMotorcycleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ItemRepository::class, \App\Repositories\ItemRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CalendarRepository::class, \App\Repositories\CalendarRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FabricatorMotorcycleRepository::class, \App\Repositories\FabricatorMotorcycleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ItenRepository::class, \App\Repositories\ItenRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FabricatorcarRepository::class, \App\Repositories\FabricatorcarRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FabricatorCarRepository::class, \App\Repositories\FabricatorCarRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\EventRepository::class, \App\Repositories\EventRepositoryEloquent::class);
        //:end-bindings:
    }
}
