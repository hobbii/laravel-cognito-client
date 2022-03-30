<?php

namespace Hobbii\LaravelCognitoClient\Facades;

use Illuminate\Support\Facades\Facade;

class Cognito extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'cognito';
    }
}
