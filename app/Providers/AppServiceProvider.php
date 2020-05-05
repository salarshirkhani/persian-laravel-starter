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
        Blade::component('alert', \App\View\Components\Dashboard\Alert::class);

        Blade::component('text-group', \App\View\Components\Form\TextGroup::class);
        Blade::component('select-group', \App\View\Components\Form\SelectGroup::class);
        Blade::component('textarea-group', \App\View\Components\Form\TextareaGroup::class);
        Blade::component('file-group', \App\View\Components\Form\FileGroup::class);
    }
}
