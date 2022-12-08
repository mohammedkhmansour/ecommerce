<?php

namespace App\Providers;

use PayPalHttp\Environment;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Cart\CartRepository;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use App\Repositories\Cart\CartModelRepository;
use PayPalCheckoutSdk\Core\SandboxEnvironment;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CartRepository::class, function() {
            return new CartModelRepository();
        });

        $this->app->singleton('paypal.client', function ($app) {
            $clientId = config('services.paypal.client_id');
            $clientSecret = config('services.paypal.client_secret');

            if (config('services.paypal.env') == 'sandbox') {
                $environment = new SandboxEnvironment($clientId, $clientSecret);
            } else {
                $environment = new Environment($clientId, $clientSecret);
            }

            $client = new PayPalHttpClient($environment);
            return $client;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFour();
    }
}
