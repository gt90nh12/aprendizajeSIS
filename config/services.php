<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'firebase' => [ 
        'apiKey' => 'AIzaSyC85c8nbr6xa_A5dA4VCbOvNcFfE8ruT3M',
        'authDomain' => 'aprendizaje-57cdc.firebaseapp.com',
        'databaseURL' => 'https://aprendizaje-57cdc-default-rtdb.firebaseio.com',
        'projectId' => 'aprendizaje-57cdc',
        'storageBucket' => 'aprendizaje-57cdc.appspot.com',
        'messagingSenderId' => '813628156735',
        'appId' => '1:813628156735:web:04306cfa2890bdaab4c18a',
        'measurementId' => 'G-6DZTR9V2TV',
    ],

];
