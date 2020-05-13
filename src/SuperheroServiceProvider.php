<?php

namespace Danstuchbury\Superheros;

class SuperheroServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/superheros.php' => config_path('superheros.php')
        ]);
    }

    public function register()
    {
        $this->app->singleton(Superheros::class, function () {
            return new Superheros(config('superheros.key'));
        });
    }
}
