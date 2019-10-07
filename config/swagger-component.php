<?php
$responses = [
    'description' => 'Requestion success.',
    'content' => [
        'application/json' => [
            'schema' => [
                'type' => 'object',
                'properties' => [
                    '{field}' => [
                        'type' => '{type}',
                        'description' => '{description}.'
                    ]
                ]
            ]
        ]
    ]
];

$parameters = [
    'in' => '{path/header/query}',
    'name' => '{name}',
    'schema' => [
        'type' => '{type}',
        'required' => '{true/false}'
    ],
    'description' => '{description}'

];

$schemas = [
    'type' => 'object',
    'properties' => [
        '{field_name}' => [
            'type' => '{type}'
        ]
    ],
    'required' => [
        '{field_name}'
    ]
];

return [
    '{response_name}' => $responses,
    '{parameter_name}' => $parameters,
    '{field_require}' => $schemas
];
