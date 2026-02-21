<?php

return [
    'manifest' => 'build/manifest.json',
    'hot_file' => env('VITE_HOT_FILE', base_path('public/hot')),
    'build_path' => env('VITE_BUILD_PATH', 'build'),
    'entrypoints' => [
        'resources/css/app.css',
        'resources/js/app.js',
    ],
];
