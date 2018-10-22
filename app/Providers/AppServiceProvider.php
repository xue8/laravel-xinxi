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
    	#问答二级栏目
    	$nav_erji = Que_Column::where('top',1)
    							->where('sid', '1')
    							->get();
    	view()->share('nav_erji', $nav_erji); 
     	#专栏二级栏目
    	$nav_erji_zhuanlan = Que_Column::where('top',1)
    									->where('sid', '2')
    									->get();
    	view()->share('nav_erji_zhuanlan', $nav_erji_zhuanlan);    	
    	   	
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
