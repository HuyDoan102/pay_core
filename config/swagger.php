<?php

return [
    'openapi' => "3.0.0",
    'info' => [
        'title' => '',
        'description' => '',
        'version' => ''
    ],
    'servers' => [
        'data' => [
            'url' => '{protocol}://{domain}:{port}/{basePath}',
            'variables' => [
                'protocol' => '',
                'domain' => '',
                'port' => '',
                'basePath' => '',
            ]
        ],
    ],
    'paths' => [
        '/uri' => ''
    ],
    'components' => [
        'securitySchemes' => '',
        'schemas' => '',
    ],
];
//openapi: 3.0.0 #version of openAPI 3.0.0
//info:
//  title: Paycore API
//  description: This is API for paycore project
//                               version: 1.0.0
//
//servers:
//  - url: '{protocol}://{domain}:{port}/{basePath}'
//    description: This is url api
//    variables:
//      protocol:
//        enum:
//        - http
//        - https
//        default: http
//      port:
//        enum:
//          - 8000
//          - 80
//        default: 8000
//      basePath:
//        default: api
//      domain:
//        enum:
//          - paycore.local
//          - 34.68.124.151
//        default: paycore.local
//
//paths:
//  /login:
//    $ref: '/js/api_docs/paths/auth.yaml#/~1login'
//components:
//securitySchemes:
//bearerAuth:
//type: http
//      scheme: bearer
//      bearerFormat: JWT
//
//  schemas:
//    User:
//      $ref: '/js/api_docs/components/schemas.yaml#/User'
