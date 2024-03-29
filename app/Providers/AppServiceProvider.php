<?php /**
 * Copyright (c) 2020. Adrian Schubek
 * https://adriansoftware.de
 */ /** @noinspection PhpFullyQualifiedNameUsageInspection */

namespace App\Providers;

use App\Http\View\Composers\UserComposer;
use Illuminate\Support\Facades\View;
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
//        if ($this->app->isLocal()) {
//            $this->app->register(TelescopeServiceProvider::class);
//        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.user.user', UserComposer::class);
    }
}
