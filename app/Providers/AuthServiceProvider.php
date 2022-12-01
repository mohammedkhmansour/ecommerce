<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function($user , $abiilty){

            if ($user->type == 'super-admin') {
                return true;
            }
        });

        Gate::define('order.pending',function($user){

            return false;
        });
        Gate::define('order.rocessing',function($user){

            return false;
        });
        Gate::define('order.completed',function($user){

            return false;
        });
        Gate::define('order.details',function($user){

            return false;
        });
        Gate::define('order.PendingToprocessing',function($user){

            return false;
        });
        Gate::define('order.ProcessingTocompleted',function($user){

            return false;
        });
        Gate::define('order.destroy',function($user){

            return false;
        });
    }
}
