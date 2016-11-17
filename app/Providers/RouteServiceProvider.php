<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Route providers that contain the configuration of a route group.
     *
     * @var array
     */
    protected $providers = [];

    public function __construct($app)
    {
        parent::__construct($app);

        $services = collect(
            json_decode(
                File::get(base_path('bootstrap/services.json'))
            )
        );

        $this->providers = $services->flatMap(function ($service) {
            if (isset($service->routes)) {
                return $service->routes;
            }
        })->toArray();
    }

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $router = $this->app['router'];

        foreach ($this->providers as $provider) {
            $provider = new $provider;

            $router->patterns($provider->patterns());
        }

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $router = $this->app['router'];

        foreach ($this->providers as $provider) {
            $provider = new $provider;

            $router->group([
                'prefix'     => $provider->prefix(),
                'namespace'  => $provider->namespacing(),
                'middleware' => $provider->middleware(),
            ], function ($router) use ($provider) {
                $provider->routes($router);
            });
        }
    }
}
