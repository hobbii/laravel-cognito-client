<?php

return [
    'key' => env('AWS_ACCESS_KEY_ID'),
    'secret' => env('AWS_SECRET_ACCESS_KEY'),
    'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    'client_id' => env('COGNITO_APP_CLIENT_ID'),
    'client_secret' => env('COGNITO_APP_CLIENT_SECRET'),
    'pool' => env('COGNITO_USER_POOL_ID'),
];
