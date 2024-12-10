<?php

return [
    'entityType' => [
        'dev' => 1046,
        'prod' => null,
    ],
    'fields' => [
        'pol' => [
            'id' => [
                'dev' => 'UF_CRM_8_POL',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => false,
            ],
        ],
        'destination' => [
            'id' => [
                'dev' => 'UF_CRM_8_DESTINATION',
                'prod' => null,
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'contractor' => [
            'id' => [
                'dev' => 'UF_CRM_8_CONTRACTOR',
                'prod' => null,
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'cost20Dry' => [
            'id' => [
                'dev' => 'UF_CRM_8_COST_20DRY',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'cost40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_8_COST_40HC',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],

        'priceValidFrom' => [
            'id' => [
                'dev' => 'UF_CRM_8_PRICE_VALID_FROM',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => false,
            ],
        ],
        'priceValidTill' => [
            'id' => [
                'dev' => 'UF_CRM_8_PRICE_VALID_TILL',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],

        ],
        'comment' => [
            'id' => [
                'dev' => 'UF_CRM_8_COMMENT',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
    ],
];