<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    // ...

    public $aliases = [
        // Other filters
        'cors' => \App\Filters\CorsFilter::class,
    ];

    public $globals = [
        'before' => [
            // Other global filters
            'cors',
        ],
        'after' => [
            // Other global filters
        ],
    ];

    // ...
}
