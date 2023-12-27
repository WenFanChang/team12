<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

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

     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        Validator::extend('numbiger', function($attribute, $value, $parameters, $validator) {
            // 假設存在名為 getNum 的方法來獲取數字
            $numCompare = \Arr::get($validator->getnum(), $parameters[0]);
            
            // 比較兩個數字
            return $numCompare > $value;
        });
        Paginator::defaultView('vendor.pagination.semantic-ui');
        
        
        
    }
}
