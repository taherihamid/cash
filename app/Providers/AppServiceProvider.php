<?php

namespace App\Providers;

use App\Menu;
use App\MenuItems;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $slug = 'main_menu';
//        $main_menu = Menu::where('slug',$slug)->first();
//        $menus = MenuItems::where('menu_id',$main_menu->id)->where('parent_id','=',0)->with('childs')->orderBy('order','DESC')->get();
//        View::share('menus', $menus);
    }
}
