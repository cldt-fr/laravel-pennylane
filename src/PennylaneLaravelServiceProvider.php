<?php

namespace CLDT\PennylaneLaravel;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class PennylaneLaravelServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('pennylane-laravel.php'),
            ], 'config');
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'pennylane-laravel');

        $this->app->singleton(PennylaneLaravel::class, function () {
            $headers = ['Accept' => 'application/json'];
            $authMethod = config('pennylane-laravel.auth.method', 'bearer');

            if ($authMethod === 'oauth2') {
                $token = config('pennylane-laravel.auth.oauth.token');
                $headers['Authorization'] = 'Bearer ' . $token;
            } else {
                $headers['Authorization'] = 'Bearer ' . config('pennylane-laravel.auth.key');
            }

            $client = new Client([
                'base_uri' => config('pennylane-laravel.endpoint'),
                'headers' => $headers,
            ]);

            return new PennylaneLaravel($client);
        });
    }
}
