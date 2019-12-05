<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views/backs/pages/category', 'index');
        $this->loadViewsFrom(__DIR__.'/views/backs/pages/category', 'edit');
        $this->loadViewsFrom(__DIR__.'/views/backs/pages/category', 'name');
        $this->loadViewsFrom(__DIR__.'/views/backs/pages/category', 'slug');
        $this->loadViewsFrom(__DIR__.'/views/backs/pages/category', 'description');
        $this->loadViewsFrom(__DIR__.'/views/backs/pages/category', 'create');
        $this->loadViewsFrom(__DIR__.'/views/backs/pages/category', 'actions');
        $this->loadViewsFrom(__DIR__. 'stubs/datatables', 'builder');
        $this->loadViewsFrom(__DIR__. 'stubs/datatables', 'datatables');
        $this->loadViewsFrom(__DIR__. 'stubs/datatables', 'html');
        $this->loadViewsFrom(__DIR__. 'stubs/datatables', 'scopes');
        $this->loadMigrationsFrom(__DIR__.'database/migrations');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
