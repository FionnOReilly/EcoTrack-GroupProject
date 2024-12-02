<?php namespace Config;

use CodeIgniter\Config\BaseConfig;
use App\Filters\CorsFilter;

class Filters extends BaseConfig
{
    
    public $aliases = [
        // Other filters
        'cors' => \App\Filters\CorsFilter::class,
    ];

public $globals = [
    'before' => [
        'cors',
    ],
    'after' => [],
];


    // ...
}
