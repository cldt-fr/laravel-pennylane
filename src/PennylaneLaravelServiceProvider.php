<?php

namespace CLDT\PennylaneLaravel;

use Illuminate\Support\Facades\Http;
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
            $authMethod = config('pennylane-laravel.auth.method', 'bearer');

            if ($authMethod === 'oauth2') {
                $token = config('pennylane-laravel.auth.oauth.token');
            } else {
                $token = config('pennylane-laravel.auth.key');
            }

            $client = Http::baseUrl(config('pennylane-laravel.endpoint'))
                ->acceptJson()
                ->withToken($token)
                ->retry(
                    config('pennylane-laravel.retry.times', 3),
                    config('pennylane-laravel.retry.sleep', 500),
                    throw: config('pennylane-laravel.retry.throw', true),
                );

            return new PennylaneLaravel($client);
        });
    }
}
