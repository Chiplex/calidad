<?php

namespace App\Providers;

use App\Policies\LevelPolicy;
use App\Policies\AttributePolicy;
use App\Models\Level;
use App\Models\Attribute;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Level::class => LevelPolicy::class,
        Attribute::class => AttributePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('store-attribute', function ($user){
            return $user->isAdministrator();
        });
    }
}
