<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Allow these paths for CORS
    'allowed_methods' => ['*'],                 // Allow all HTTP methods
    'allowed_origins' => ['http://localhost:3000'], // Add your frontend's origin
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],                // Allow all headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,            // Enable cookies for CORS
];