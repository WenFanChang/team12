<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\support\Facades\Vaildator;
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
       /* validator::extend('numbiger',function($attribute, $value, $parameters, $validator){
            $numCompare =\Arr::get ($validator->getnum(), $parameters[0]);
            return $numCompare > $value;





        });
        Paginator::defaultView('vendor.pagination.semantic-ui');*/


    }
}
