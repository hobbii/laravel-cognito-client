# Hobbii Laravel Cognito Client
[![Coverage Status](https://coveralls.io/repos/github/hobbii/laravel-cognito-client/badge.svg?branch=main)](https://coveralls.io/github/hobbii/laravel-cognito-client?branch=main)
[![Total Downloads](https://img.shields.io/packagist/dt/hobbii/laravel-cognito-client)](https://packagist.org/packages/hobbii/laravel-cognito-client)
[![Latest Version](https://img.shields.io/packagist/v/laravel-hobbii/cognito-client)](https://packagist.org/packages/hobbii/laravel-cognito-client)
![CI Workflow](https://github.com/hobbii/laravel-cognito-client/actions/workflows/ci.yml/badge.svg?branch=main)

A public composer pacakge, adding a Cognito Client for [Laravel](https://laravel.com/) using [hobbii/cognito-client](https://github.com/hobbii/cognito-client)

```shell
composer require hobbii/laravel-cognito-client
```

## Installation
Add the following environment variables:
```env
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
COGNITO_APP_CLIENT_ID=
COGNITO_APP_CLIENT_SECRET=
COGNITO_USER_POOL_ID=
```

## Usage
Use the `hobbii`-driver with socialite:

````php
<?php

use Illuminate\Http\Request;
use Hobbii\LaravelCognitoClient\Facades\Cognito;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $authSession = Cognito::authenticate($request->email, $request->password);
        
        if ($authSession->success()) {
            return redirect()->route('dashboard');
        }
        
        return back()->withErrors([
            'email' => 'Invalid email or password!'
        ]);
    }
}
````

## Customisation
Publish the configuration file to customise settings, by running
```shell
php artisan vendor:publish --provider="Hobbii\LaravelCognitoClient\CognitoClientServiceProvider" --tag=config
```
Customise the configurations in `config/hobbii-cognito.php`.


## Testing
You can find tests in the `/tests` folder, and you can run them by using `./vendor/bin/phpunit`.

## Static analysis
You can run [PHPStan](https://phpstan.org/), by executing `./vendor/bin/phpstan analyse`

## License
All contents of this package are licensed under the [MIT license](LICENSE).
