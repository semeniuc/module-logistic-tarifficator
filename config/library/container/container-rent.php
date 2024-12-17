<?php

return [
    'entityType' => [
        'dev' => 1046,
        'prod' => 1070,
    ],
    'fields' => [
        'pol' => [
            'id' => [
                'dev' => 'UF_CRM_8_POL',
                'prod' => 'UF_CRM_13_POL',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'destination' => [
            'id' => [
                'dev' => 'UF_CRM_8_DESTINATION',
                'prod' => 'UF_CRM_13_DESTINATION',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'contractor' => [
            'id' => [
                'dev' => 'UF_CRM_8_CONTRACTOR',
                'prod' => 'UF_CRM_13_CONTRACTOR',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'cost20Dry' => [
            'id' => [
                'dev' => 'UF_CRM_8_COST_20DRY',
                'prod' => 'UF_CRM_13_COST_20DRY',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'cost40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_8_COST_40HC',
                'prod' => 'UF_CRM_13_COST_40HC',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],

        'priceValidFrom' => [
            'id' => [
                'dev' => 'UF_CRM_8_PRICE_VALID_FROM',
                'prod' => 'UF_CRM_13_PRICE_VALID_FROM',
            ],
            'view' => [
                'filter' => false,
                'list' => false,
            ],
        ],
        'priceValidTill' => [
            'id' => [
                'dev' => 'UF_CRM_8_PRICE_VALID_TILL',
                'prod' => 'UF_CRM_13_PRICE_VALID_TILL',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],

        ],
        'comment' => [
            'id' => [
                'dev' => 'UF_CRM_8_COMMENT',
                'prod' => 'UF_CRM_13_COMMENT',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
    ],
];