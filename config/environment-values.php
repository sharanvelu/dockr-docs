<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Markdown Repository
    |--------------------------------------------------------------------------
    |
    | Markdown for Documentations
    |
    */
    'markdown' => [
        'repo' => [
            'url' => env('MARKDOWN_REPO_URL', 'https://github.com/sharanvelu/dockr-documentation.git'),
        ],
        'raw' => [
            'repo_url' => env('MARKDOWN_RAW_REPO_URL', 'https://raw.githubusercontent.com/sharanvelu/dockr-documentation/'),
        ],
        'cache' => [
            'ttl' => env('MARKDOWN_CACHE_TTL', 60 * 60 * 24)
        ],
        'empty' => [
            'error' => '## Error',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Dockr
    |--------------------------------------------------------------------------
    */
    'dockr' => [
        'github' => env('DOCKR_URL_GITHUB', 'https://github.com/sharanvelu/dockr.git'),
        'docker_hub' => env('DOCKR_URL_DOCKER_HUB', 'https://hub.docker.com/repository/docker/sharanvelu/laravel-php'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Versions List
    |--------------------------------------------------------------------------
    */
    'version' => [
        'list' => [
            'v1.1',
            'v1.2',
        ],
        'default' => 'v1.2',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Paths
    |--------------------------------------------------------------------------
    */
    'path' => [
        'default' => 'installation',
        'sidebar' => 'documentation',
    ],
];
