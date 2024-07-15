<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Define Super Admin User
        Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ? true : null;
        });
        //PARA QIE LAS MIGRACIONES NO TENGAN ERRORES AL RELACIONAR
       Schema::defaultStringLength(191);

       //PARA EL PAGINADOR DE BOOSTRAP
        Paginator::useBootstrap();
    }
}
