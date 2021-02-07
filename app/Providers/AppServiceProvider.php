<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Menu;
 use Illuminate\Support\Facades\Schema;
 
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
        
       

        Schema::defaultStringLength(191);


        //
        // $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
        //     $event->menu->add('MAIN NAVIGATION');

        //     $items = Menu::all()->map(function (Menu $menu) {
        //     if($menu['header']){
        //         return ['header' => $menu['header']];
        //     }
        //     else{
        //         return [
        //             'text' => $menu['title'],
        //             'url' => $menu['url'],
        //             'icon' =>  $menu['icon'],
        //             'can' => $menu['can'],
        //             'label' => $menu['label'],
        //             'label_color' => $menu['label_color']
        //         ];
        //     }
        //     });
        // //    dd($items);

        //     $event->menu->add(...$items);
        // });
    }
}
