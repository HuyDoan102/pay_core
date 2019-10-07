<?php

return [
    '/{uri}' => [
        '{method}' => [
            'security' => [
                [
                    'bearerAuth' => 'array'
                ]
            ],
            'tags' => '',
            'summary' => '',
            'responses' => [
                '{code}' => [
                    '$ref' => '/js/api_docs/components/{name_file}.yaml#/{status_name}'
                ]
            ]
        ]
    ]
];
