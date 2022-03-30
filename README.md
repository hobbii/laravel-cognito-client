# Hobbii Laravel Cognito Client

A Cognito Client for Laravel using [hobbii/cognito-client](https://github.com/hobbii/cognito-client)

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
use Hobbii\CognitoClient\CognitoClient;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $authSession = app(CognitoClient::class)->authenticate($request->email, $request->password);
        
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
