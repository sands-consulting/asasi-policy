<?php

namespace Sands\Asasi\Policy;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class PolicyServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {   
        $this->app->singleton('policy', function() {
            return new Policy($this->app->auth->guard());
        });
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
