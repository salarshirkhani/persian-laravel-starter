<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('breadcrumb-item', \App\View\Components\Dashboard\BreadcrumbItem::class);
        Blade::component('card', \App\View\Components\Dashboard\Card::class);
    }
}
