<?php

return [
    'endpoint' => env('PENNYLANE_API_ENDPOINT', 'https://app.pennylane.com/api/external/v2/'),
    'auth' => [
        'method' => env('PENNYLANE_AUTH_METHOD', 'bearer'),
        'key' => env('PENNYLANE_API_KEY'),
        'oauth' => [
            'client_id' => env('PENNYLANE_OAUTH_CLIENT_ID'),
            'client_secret' => env('PENNYLANE_OAUTH_CLIENT_SECRET'),
            'redirect_uri' => env('PENNYLANE_OAUTH_REDIRECT_URI'),
            'token' => env('PENNYLANE_OAUTH_TOKEN'),
            'refresh_token' => env('PENNYLANE_OAUTH_REFRESH_TOKEN'),
        ],
    ],
];
