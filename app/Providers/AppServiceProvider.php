<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\InsertQuery;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('QuqeryB', InsertQuery::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
