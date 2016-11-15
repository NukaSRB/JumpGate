<?php

namespace App\Http\Routes;

use JumpGate\Core\Contracts\Routes;
use JumpGate\Core\Providers\Routes as BaseRoutes;
use Illuminate\Routing\Router;

class Admin extends BaseRoutes implements Routes
{
    public function namespacing()
    {
        return 'App\Http\Controllers\Admin';
    }

    public function prefix()
    {
        return 'admin';
    }

    public function middleware()
    {
        return ['web', 'auth', 'acl:administrate'];
    }

    public function patterns()
    {
        return [];
    }

    public function routes(Router $router)
    {
        $router->get('/')
               ->name('admin.home')
               ->uses('HomeController@index')
               ->middleware('active:admin_dashboard');
    }
}
