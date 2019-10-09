<?php
$responses = [
    'description' => '{description}.',
    'content' => [
        'application/json' => [
            'schema' => [
                'type' => 'object',
                'properties' => [
                    'message' => [
                        'type' => 'string',
                        'description' => '{description}.'
                    ],
                    'data' => [
                        'type' => '{type}',
                        'description' => 'Data responses.'
                    ],
                    'status' => [
                        'type' => 'boolean',
                        'default' => '{true/false}',
                        'description' => 'Status code.'
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
    ],
    'required' => '{true/false}',
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
    '{schemas_require}' => $schemas
];
