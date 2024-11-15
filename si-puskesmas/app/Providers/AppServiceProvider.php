<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('admin', function(User $user) {
            if($user->role === 'admin'){
                return true;
            }
        });

        Gate::define('dokter', function(User $user) {
            if($user->role === 'dokter'){
                return true;
            }
        });
        
        Gate::define('apoteker', function(User $user) {
            if($user->role === 'apoteker'){
                return true;
            }
        });
    }
}
