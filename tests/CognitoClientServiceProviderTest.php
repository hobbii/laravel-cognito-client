<?php

namespace Tests;

use Hobbii\CognitoClient\CognitoClient;
use Hobbii\LaravelCognitoClient\CognitoClientServiceProvider;
use Hobbii\LaravelCognitoClient\Facades\Cognito;
use Orchestra\Testbench\TestCase;

class CognitoClientServiceProviderTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            CognitoClientServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Cognito' => Cognito::class,
        ];
    }

    public function testCognitoClientIsAddedAsSingleton(): void
    {
        $this->assertInstanceOf(CognitoClient::class, Cognito::getFacadeRoot());
    }
}
