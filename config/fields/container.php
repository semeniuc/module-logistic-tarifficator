<?php

return [
    'destination' => [
        'id' => [
            'dev' => 'UF_CRM_7_DESTINATION',
            'prod' => 'UF_CRM_7_DESTINATION',
        ],
        'view' => [
            'filter' => true,
            'list' => true,
        ],
    ],
    'contractor' => [
        'id' => [
            'dev' => 'UF_CRM_7_CONTRACTOR',
            'prod' => 'UF_CRM_7_CONTRACTOR',
        ],
        'view' => [
            'filter' => true,
            'list' => true,
        ],
    ],
    'cost20Dry' => [
        'id' => [
            'dev' => 'UF_CRM_7_COST_20DRY',
            'prod' => 'UF_CRM_7_COST_20DRY',
        ],
        'view' => [
            'filter' => false,
            'list' => true,
        ],
    ],
    'cost40Hc' => [
        'id' => [
            'dev' => 'UF_CRM_7_COST_40HC',
            'prod' => 'UF_CRM_7_COST_40HC',
        ],
        'view' => [
            'filter' => false,
            'list' => true,
        ],
    ],

    'priceValidFrom' => [
        'id' => [
            'dev' => 'UF_CRM_7_PRICE_VALID_FROM',
            'prod' => 'UF_CRM_7_PRICE_VALID_FROM',
        ],
        'view' => [
            'filter' => false,
            'list' => false,
        ],
    ],
    'priceValidTill' => [
        'id' => [
            'dev' => 'UF_CRM_7_PRICE_VALID_TILL',
            'prod' => 'UF_CRM_7_PRICE_VALID_TILL',
        ],
        'view' => [
            'filter' => false,
            'list' => true,
        ],
    ],
    'comment' => [
        'id' => [
            'dev' => 'UF_CRM_7_COMMENT',
            'prod' => 'UF_CRM_7_COMMENT',
        ],
        'view' => [
            'filter' => false,
            'list' => true,
        ],
    ],
];