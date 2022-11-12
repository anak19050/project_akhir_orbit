<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

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
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add([
                'text' => 'Home',
                'url' => route('home'),
                'icon' => 'fas fa-home',
                'active' => ['home'],
            ]);
            $event->menu->add([
                'text' => 'Food',
                'url' => route('food.index'),
                'icon' => '	far fa-circle',
                'active' => ['food.index'],
            ]);

            $event->menu->add([
                'text' => 'Ingridient',
                'url' => route('ingridient.index'),
                'icon' => '	far fa-circle',
                'active' => ['ingridient.index'],
            ]);

            $event->menu->add([
                'text' => 'Recomendation',
                // 'url' => route('recomendation.index'),
                // 'icon' => '	far fa-circle',
                // 'active' => ['recomendation.index'],
            ]);
        });
    }
}
