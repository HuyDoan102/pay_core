<?php

return [
    'openapi' => "3.0.0",
    'info' => [
        'title' => '{Name Project}',
        'description' => 'This is API for {Name Project} project',
        'version' => '1.0.0'
    ],
    'servers' => [
        [
            'url' => '{protocol}://{domain}:{port}/{basePath}',
            'description' => '',
            'variables' => [
                'protocol' => [
                    'enum' => [
                        'http',
                        'https'
                    ],
                    'default' => 'http'
                ],
                'domain' => [
                    'enum' => [
                        '34.68.124.151',
                        'paycore.local'
                    ],
                    'default' => 'paycore.local'
                ],
                'port' => [
                    'enum' => [
                        80,
                        8000
                    ],
                    'default' => 8000
                ],
                'basePath' => [
                    'default' => 'api'
                ],
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
            'Input' => [
                '$ref' => '/js/api_docs/components/{name_file}.yaml#/{Input}'
            ],
        ]
    ],
];
