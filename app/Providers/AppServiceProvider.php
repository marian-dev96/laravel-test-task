<?php

namespace App\Providers;

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

    protected $widgets = [
        \App\Admin\Widgets\NavigationUserBlock::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $widgetsRegistry = $this->app[\SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface::class];

        foreach ($this->widgets as $widget) {
            $widgetsRegistry->registerWidget($widget);
        }
    }
}
