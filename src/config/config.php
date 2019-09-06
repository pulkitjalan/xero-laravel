<?php

return [
    /*
    |--------------------------------------------------------------------------
    | OAuth
    |--------------------------------------------------------------------------
    */
    'oauth' => [
        /*
        |--------------------------------------------------------------------------
        | Callback URL
        |--------------------------------------------------------------------------
        |
        | Provide a callback URL, or use 'oob' if one isn't required.
        |
        */
        'callback' => env('XERO_CALLBACK', 'oob'),

        /*
        |--------------------------------------------------------------------------
        | Xero application authentication
        |--------------------------------------------------------------------------
        |
        | Before using this service, you'll need to register an applicatin via
        | the Xero developer website. When setting up your application, take
        | note of the consumer key and shared secret, as well as the
        | application type (private, public or partner).
        |
        */
        'consumer_key' => env('XERO_CUSTOMER_KEY', ''),
        'consumer_secret' => env('XERO_CUSTOMER_SECRET', ''),

        /*
        |--------------------------------------------------------------------------
        | RSA keys
        |--------------------------------------------------------------------------
        |
        | Ensure that you have generated the required private and public rsa keys
        | using the guide provided:
        |
        | https://developer.xero.com/documentation/api-guides/create-publicprivate-key
        |
        | Provide the path to the keys on disk or a PEM formatted string
        |
        */
        'rsa_public_key' => env('XERO_PUBLIC_KEY_FILE') ? ('file://'.env('XERO_PUBLIC_KEY_FILE')) : env('XERO_PUBLIC_KEY', ''),
        'rsa_private_key' => env('XERO_PRIVATE_KEY_FILE') ? ('file://'.env('XERO_PRIVATE_KEY_FILE')) : env('XERO_PRIVATE_KEY', ''),
    ],
];
