<?php

return [
    'entityType' => [
        'dev' => 177,
        'prod' => 1040,
    ],
    'fields' => [
        'terminal' => [
            'id' => [
                'dev' => 'UF_CRM_6_TERMINAL',
                'prod' => 'UF_CRM_6_TERMINAL',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'destination' => [
            'id' => [
                'dev' => 'UF_CRM_6_DESTINATION',
                'prod' => 'UF_CRM_6_DESTINATION',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'contractor' => [
            'id' => [
                'dev' => 'UF_CRM_6_CONTRACTOR',
                'prod' => 'UF_CRM_6_CONTRACTOR',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCost20DryLess18' => [
            'id' => [
                'dev' => 'UF_CRM_6_DELIVERY_COST_20DRY_LESS_18',
                'prod' => 'UF_CRM_6_DELIVERY_COST_20DRY_LESS_18',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCost40HcLess20' => [
            'id' => [
                'dev' => 'UF_CRM_6_DELIVERY_COST_40HC_LESS_20',
                'prod' => 'UF_CRM_6_DELIVERY_COST_40HC_LESS_20',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryPriceValidFrom' => [
            'id' => [
                'dev' => 'UF_CRM_6_DELIVERY_PRICE_VALID_FROM',
                'prod' => 'UF_CRM_6_DELIVERY_PRICE_VALID_FROM',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryPriceValidTill' => [
            'id' => [
                'dev' => 'UF_CRM_6_DELIVERY_PRICE_VALID_TILL',
                'prod' => 'UF_CRM_6_DELIVERY_PRICE_VALID_TILL',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],

        'loadingFee20Dry' => [
            'id' => [
                'dev' => 'UF_CRM_6_LOADING_FEE_20DRY',
                'prod' => 'UF_CRM_6_LOADING_FEE_20DRY',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'loadingFee40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_6_LOADING_FEE_40HC',
                'prod' => 'UF_CRM_6_LOADING_FEE_40HC',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'loadingFeeValidFrom' => [
            'id' => [
                'dev' => 'UF_CRM_6_LOADING_FEE_VALID_FROM',
                'prod' => 'UF_CRM_6_LOADING_FEE_VALID_FROM',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'loadingFeeValidTill' => [
            'id' => [
                'dev' => 'UF_CRM_6_LOADING_FEE_VALID_TILL',
                'prod' => 'UF_CRM_6_LOADING_FEE_VALID_TILL',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'comment' => [
            'id' => [
                'dev' => 'UF_CRM_6_COMMENT',
                'prod' => 'UF_CRM_6_COMMENT',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
    ],
];