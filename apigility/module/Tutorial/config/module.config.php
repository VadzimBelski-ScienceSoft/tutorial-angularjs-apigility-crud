<?php
return array(
    'router' => array(
        'routes' => array(
            'tutorial.rest.cliente' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/cliente[/:cliente_id]',
                    'defaults' => array(
                        'controller' => 'Tutorial\\V1\\Rest\\Cliente\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'tutorial.rest.cliente',
        ),
    ),
    'zf-rest' => array(
        'Tutorial\\V1\\Rest\\Cliente\\Controller' => array(
            'listener' => 'Tutorial\\V1\\Rest\\Cliente\\ClienteResource',
            'route_name' => 'tutorial.rest.cliente',
            'route_identifier_name' => 'cliente_id',
            'collection_name' => 'cliente',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(
                0 => 'nome',
                1 => 'sort',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Tutorial\\V1\\Rest\\Cliente\\ClienteEntity',
            'collection_class' => 'Tutorial\\V1\\Rest\\Cliente\\ClienteCollection',
            'service_name' => 'Cliente',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Tutorial\\V1\\Rest\\Cliente\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Tutorial\\V1\\Rest\\Cliente\\Controller' => array(
                0 => 'application/vnd.tutorial.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Tutorial\\V1\\Rest\\Cliente\\Controller' => array(
                0 => 'application/vnd.tutorial.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Tutorial\\V1\\Rest\\Cliente\\ClienteEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'tutorial.rest.cliente',
                'route_identifier_name' => 'cliente_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Tutorial\\V1\\Rest\\Cliente\\ClienteCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'tutorial.rest.cliente',
                'route_identifier_name' => 'cliente_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-apigility' => array(
        'db-connected' => array(),
    ),
    'service_manager' => array(
        'factories' => array(
            'Tutorial\\V1\\Rest\\Cliente\\ClienteResource' => 'Tutorial\\V1\\Rest\\Cliente\\ClienteResourceFactory',
        ),
    ),
    'zf-content-validation' => array(
        'Tutorial\\V1\\Rest\\Cliente\\Controller' => array(
            'input_filter' => 'Tutorial\\V1\\Rest\\Cliente\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Tutorial\\V1\\Rest\\Cliente\\Validator' => array(
            0 => array(
                'name' => 'nome',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'description' => 'Nome do cliente',
                'error_message' => 'Preencha o nome do cliente',
            ),
            1 => array(
                'name' => 'sobrenome',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
                'description' => 'Sobrenome do cliente',
            ),
        ),
    ),
);
