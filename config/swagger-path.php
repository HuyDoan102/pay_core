<?php

return [
    '/{uri}' => [
        '{method}' => [
            'security' => [
                [
                    'bearerAuth' => 'array'
                ]
            ],
            'tags' => [
                'tag_name'
            ],
            'summary' => '',
            'parameters' => [
                [
                    '$ref' => '/swagger/api_docs/components/{name_file}.yaml#/{parameter_name}'
                ]
            ],
            'requestBody' => [
                'content' => [
                    'application/json' => [
                        'schema' => [
                            '$ref' => '/swagger/api_docs/components/{name_file}.yaml#/{Input}'
                        ]
                    ]
                ]
            ],
            'responses' => [
                '{code}' => [
                    '$ref' => '/swagger/api_docs/components/{name_file}.yaml#/{status_name}'
                ]
            ]
        ]
    ]
];
