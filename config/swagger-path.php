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
                    '$ref' => config('pay.path_swagger') . '/components/{name_file}.yaml#/{parameter_name}'
                ]
            ],
            'requestBody' => [
                'content' => [
                    'application/json' => [
                        'schema' => [
                            '$ref' => config('pay.path_swagger') . '/components/{name_file}.yaml#/{Input}'
                        ]
                    ]
                ]
            ],
            'responses' => [
                '{code}' => [
                    '$ref' => config('pay.path_swagger') . '/components/{name_file}.yaml#/{status_name}'
                ]
            ]
        ]
    ]
];
