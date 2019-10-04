<?php

return [
    'openapi' => "3.0.0",
    'info' => [
        'title' => '',
        'description' => '',
        'version' => ''
    ],
    'servers' => [
        '-' => [
            'url' => '{protocol}://{domain}:{port}/{basePath}',
            'description' => '',
            'variables' => [
                'protocol' => '',
                'domain' => '',
                'port' => '',
                'basePath' => '',
            ]
        ],
    ],
    'paths' => [
        '/uri' => [
            '$ref' => '/js/api_docs/paths/{name_file}.yaml#/~1{uri}'
        ]
    ],
    'components' => [
        'securitySchemes' => [
            'bearerAuth' => [
                'type' => 'http',
                'scheme' => 'bearer',
                'bearerFormat'=> 'JWT'
            ]
        ],
        'schemas' => [
            '{Input}' => [
                'type' => 'object',
                'properties' => [
                    '{field}' => [
                        'type' => '{type}'
                    ]
                ],
                'required' => [
                    '{field}'
                ]
            ],
        ]
    ],
];
