<?php

namespace Tests;

use Hobbii\CognitoClient\CognitoClient;
use Hobbii\LaravelCognitoClient\CognitoClientServiceProvider;
use Orchestra\Testbench\TestCase;

class CognitoClientServiceProviderTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            CognitoClientServiceProvider::class,
        ];
    }

    public function testCognitoClientIsAddedAsSingleton(): void
    {
        $this->assertInstanceOf(CognitoClient::class, $this->app->make(CognitoClient::class));
    }
}
