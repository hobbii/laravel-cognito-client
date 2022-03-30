<?php

namespace Hobbii\LaravelCognitoClient;

use Hobbii\CognitoClient\CognitoClient;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class CognitoClientServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/hobbii-cognito.php',
            'hobbii-cognito'
        );
    }

    public function boot(): void
    {
        $this->app->singleton(CognitoClient::class, function (Application $app) {
            return CognitoClient::init(
                $app['config']['hobbii-cognito.key'],
                $app['config']['hobbii-cognito.secret'],
                $app['config']['hobbii-cognito.region'],
                $app['config']['hobbii-cognito.client_id'],
                $app['config']['hobbii-cognito.client_secret'],
                $app['config']['hobbii-cognito.pool'],
            );
        });

        $this->publishes([
            __DIR__ . '/../config/hobbii-cognito.php' => config_path('hobbii-cognito.php'),
        ]);
    }
}
