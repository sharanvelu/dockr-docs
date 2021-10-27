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

    'version' => [
        'list' => [
            '0.1',
            'temp',
            'laravel'
        ],
    ],
];
