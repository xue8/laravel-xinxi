<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Que_Column;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	Schema::defaultStringLength(191);
		\Carbon\Carbon::setLocale('zh');    	
    	//$nav = Que_Column::all();
    	#顶级栏目
    	$nav = Que_Column::where('top',0)->get();
    	view()->share('nav', $nav);
    	#二级栏目
    	$nav_erji = Que_Column::where('top',1)->get();
    	view()->share('nav_erji', $nav_erji);    	
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
