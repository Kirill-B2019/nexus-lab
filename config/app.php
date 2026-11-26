<?php

return [

    'name' => env('APP_NAME', 'Лаборатория НЕКСУС'),
    'env' => env('APP_ENV', 'production'),
    'debug' => (bool) env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'asset_url' => env('ASSET_URL'),

    'timezone' => env('APP_TIMEZONE', 'UTC'),
    'locale' => env('APP_LOCALE', 'ru'),
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'ru'),
    'faker_locale' => env('APP_FAKER_LOCALE', 'ru_RU'),

    'key' => env('APP_KEY'),
    'cipher' => env('APP_CIPHER', 'AES-256-CBC'),
    'previous_keys' => array_filter(
        array_map(trim(...), explode(',', env('APP_PREVIOUS_KEYS', '')))
    ),

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

    'providers' => array_filter(
        preg_split('/\s*,\s*/', trim(env('APP_PROVIDERS', '')))
    ),

];
