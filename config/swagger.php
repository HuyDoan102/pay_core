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
        '/me' => [
            'get' => [
                'deprecated' => true,
                'security' => [
                    [
                        'bearerAuth' => 'array'
                    ]
                ],
                'tags' => [
                    'tag_name'
                ],
                'summary' => 'Get information of users.',
                'responses' => [
                    '200' => [
                        'description' => 'status 200.'
                    ],
                    '400' => [
                        'description' => 'status 400.'
                    ],
                    '401' => [
                        'description' => 'status 401.'
                    ]
                ]
            ]
        ],
        '/uri' => [
            '$ref' => '/swagger/api_docs/paths/{name_file}.yaml#/~1{uri}'
        ]
    ],
    'components' => [
        'securitySchemes' => [
            'bearerAuth' => [
                'description' => "The following syntax must be used in the 'Authorization' header : \n\n    Value: xxxxxx.yyyyyyy.zzzzzz\ntype: JWT name: Authorization in: header",
                'type' => 'http',
                'scheme' => 'bearer',
                'bearerFormat'=> 'JWT'
            ]
        ],
        'schemas' => [
            'Input' => [
                '$ref' => '/swagger/api_docs/components/{name_file}.yaml#/{Input}'
            ],
        ]
    ],
];
