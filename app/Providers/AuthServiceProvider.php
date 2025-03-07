<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Record;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Gate::define('view-events', function (User $user) {
            return $user->hasPermissionTo('view-events');
        });

        Gate::define('manage-events', function (User $user) {
            return $user->hasPermissionTo('manage-events');
        });
    }
}
