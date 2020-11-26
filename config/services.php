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

    'google' => [
        'client_id' => '322013441621-2rh4jll1okuuk957ithm2lgu3r6a12p6.apps.googleusercontent.com',
        'client_secret' => 'BL2OcxJYCknKvHF8qB5SJrWP',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

    'github' => [
        'client_id' => '9fd17abe6bcc4229a0bd',
        'client_secret' => 'd0a5c703fc21bcfcbc47657409fb7a32d2d0064d',
        'redirect' =>  'http://127.0.0.1:8000/callback/github',
    ],

    'linkedin' => [
        'client_id' => '77jzx9qctovs04',
        'client_secret' => 'wvODGy9czcl2EpQO',
        'redirect' => 'http://127.0.0.1:8000/callback/linkedin',
      ],
  
   

];
