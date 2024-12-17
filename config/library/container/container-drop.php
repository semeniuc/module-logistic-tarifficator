<?php

return [
    'entityType' => [
        'dev' => 159,
        'prod' => 1062,
    ],
    'fields' => [
        'pod' => [
            'id' => [
                'dev' => 'UF_CRM_7_POD',
                'prod' => 'UF_CRM_11_POD',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'terminal' => [
            'id' => [
                'dev' => 'UF_CRM_7_TERMINAL',
                'prod' => 'UF_CRM_11_TERMINAL',
            ],
            'view' => [
                'filter' => false,
                'list' => false,
            ],
        ],
        'destination' => [
            'id' => [
                'dev' => 'UF_CRM_7_DESTINATION',
                'prod' => 'UF_CRM_11_DESTINATION',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'contractor' => [
            'id' => [
                'dev' => 'UF_CRM_7_CONTRACTOR',
                'prod' => 'UF_CRM_11_CONTRACTOR',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'cost20Dry' => [
            'id' => [
                'dev' => 'UF_CRM_7_COST_20DRY',
                'prod' => 'UF_CRM_11_COST_20DRY',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'cost40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_7_COST_40HC',
                'prod' => 'UF_CRM_11_COST_40HC',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'priceValidFrom' => [
            'id' => [
                'dev' => 'UF_CRM_7_PRICE_VALID_FROM',
                'prod' => 'UF_CRM_11_PRICE_VALID_FROM',
            ],
            'view' => [
                'filter' => false,
                'list' => false,
            ],
        ],
        'priceValidTill' => [
            'id' => [
                'dev' => 'UF_CRM_7_PRICE_VALID_TILL',
                'prod' => 'UF_CRM_11_PRICE_VALID_TILL',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'comment' => [
            'id' => [
                'dev' => 'UF_CRM_7_COMMENT',
                'prod' => 'UF_CRM_11_COMMENT',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
    ],
];