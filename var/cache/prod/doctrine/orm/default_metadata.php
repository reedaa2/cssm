<?php

// This file has been auto-generated by the Symfony Cache Component.

return [[

'App__Entity__User__CLASSMETADATA__' => 0,

], [

0 => static function () {
    return \Symfony\Component\VarExporter\Internal\Hydrator::hydrate(
        $o = [
            clone (($p = &\Symfony\Component\VarExporter\Internal\Registry::$prototypes)['Doctrine\\ORM\\Mapping\\ClassMetadata'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Doctrine\\ORM\\Mapping\\ClassMetadata')),
            clone ($p['Doctrine\\ORM\\Id\\IdentityGenerator'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Doctrine\\ORM\\Id\\IdentityGenerator')),
        ],
        null,
        [
            'stdClass' => [
                'name' => [
                    'App\\Entity\\User',
                ],
                'namespace' => [
                    'App\\Entity',
                ],
                'rootEntityName' => [
                    'App\\Entity\\User',
                ],
                'customRepositoryClassName' => [
                    'App\\Repository\\UserRepository',
                ],
                'identifier' => [
                    [
                        'id',
                    ],
                ],
                'generatorType' => [
                    4,
                ],
                'fieldMappings' => [
                    [
                        'id' => [
                            'fieldName' => 'id',
                            'type' => 'integer',
                            'scale' => null,
                            'length' => null,
                            'unique' => false,
                            'nullable' => false,
                            'precision' => null,
                            'id' => true,
                            'columnName' => 'id',
                        ],
                        'numeroCard' => [
                            'fieldName' => 'numeroCard',
                            'type' => 'string',
                            'scale' => null,
                            'length' => 255,
                            'unique' => false,
                            'nullable' => true,
                            'precision' => null,
                            'columnName' => 'numero_card',
                        ],
                        'month' => [
                            'fieldName' => 'month',
                            'type' => 'string',
                            'scale' => null,
                            'length' => 255,
                            'unique' => false,
                            'nullable' => true,
                            'precision' => null,
                            'columnName' => 'month',
                        ],
                        'year' => [
                            'fieldName' => 'year',
                            'type' => 'string',
                            'scale' => null,
                            'length' => 255,
                            'unique' => false,
                            'nullable' => true,
                            'precision' => null,
                            'columnName' => 'year',
                        ],
                        'step' => [
                            'fieldName' => 'step',
                            'type' => 'string',
                            'scale' => null,
                            'length' => 255,
                            'unique' => false,
                            'nullable' => true,
                            'precision' => null,
                            'columnName' => 'step',
                        ],
                        'nowStep' => [
                            'fieldName' => 'nowStep',
                            'type' => 'string',
                            'scale' => null,
                            'length' => 255,
                            'unique' => false,
                            'nullable' => true,
                            'precision' => null,
                            'columnName' => 'now_step',
                        ],
                        'ip' => [
                            'fieldName' => 'ip',
                            'type' => 'string',
                            'scale' => null,
                            'length' => 255,
                            'unique' => false,
                            'nullable' => true,
                            'precision' => null,
                            'columnName' => 'ip',
                        ],
                        'montant' => [
                            'fieldName' => 'montant',
                            'type' => 'string',
                            'scale' => null,
                            'length' => 255,
                            'unique' => false,
                            'nullable' => true,
                            'precision' => null,
                            'columnName' => 'montant',
                        ],
                        'code' => [
                            'fieldName' => 'code',
                            'type' => 'string',
                            'scale' => null,
                            'length' => 255,
                            'unique' => false,
                            'nullable' => true,
                            'precision' => null,
                            'columnName' => 'code',
                        ],
                        'code2' => [
                            'fieldName' => 'code2',
                            'type' => 'string',
                            'scale' => null,
                            'length' => 255,
                            'unique' => false,
                            'nullable' => true,
                            'precision' => null,
                            'columnName' => 'code2',
                        ],
                        'text' => [
                            'fieldName' => 'text',
                            'type' => 'text',
                            'scale' => null,
                            'length' => null,
                            'unique' => false,
                            'nullable' => true,
                            'precision' => null,
                            'columnName' => 'text',
                        ],
                    ],
                ],
                'fieldNames' => [
                    [
                        'id' => 'id',
                        'numero_card' => 'numeroCard',
                        'month' => 'month',
                        'year' => 'year',
                        'step' => 'step',
                        'now_step' => 'nowStep',
                        'ip' => 'ip',
                        'montant' => 'montant',
                        'code' => 'code',
                        'code2' => 'code2',
                        'text' => 'text',
                    ],
                ],
                'columnNames' => [
                    [
                        'id' => 'id',
                        'numeroCard' => 'numero_card',
                        'month' => 'month',
                        'year' => 'year',
                        'step' => 'step',
                        'nowStep' => 'now_step',
                        'ip' => 'ip',
                        'montant' => 'montant',
                        'code' => 'code',
                        'code2' => 'code2',
                        'text' => 'text',
                    ],
                ],
                'table' => [
                    [
                        'name' => 'user',
                    ],
                ],
                'idGenerator' => [
                    $o[1],
                ],
            ],
        ],
        $o[0],
        []
    );
},

]];
