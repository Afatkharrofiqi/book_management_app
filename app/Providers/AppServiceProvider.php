<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        \Schema::defaultStringLength(191);

        Gate::define('manage-users', function($user){
            return count(array_intersect(["ADMIN"], json_decode($user->roles)));
        });

        Gate::define('manage-categories', function($user){
            return count(array_intersect(["ADMIN", "STAFF"], json_decode($user->roles)));
        });

        Gate::define('manage-books', function($user){
            return count(array_intersect(["ADMIN", "STAFF"], json_decode($user->roles)));
        });
    }
}
