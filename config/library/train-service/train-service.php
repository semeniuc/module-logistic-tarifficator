<?php

return [
    'entityType' => [
        'dev' => 1060,
        'prod' => null,
    ],
    'fields' => [
        'terminal' => [
            'id' => [
                'dev' => 'UF_CRM_11_TERMINAL',
                'prod' => null,
            ],
            'view' => [
                'filter' => true,
                'list' => false,
            ],
        ],
        'destination' => [
            'id' => [
                'dev' => 'UF_CRM_11_DESTINATION',
                'prod' => null,
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'station' => [
            'id' => [
                'dev' => 'UF_CRM_11_STATION',
                'prod' => 'UF_CRM_11_STATION',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'contractor' => [
            'id' => [
                'dev' => 'UF_CRM_11_CONTRACTOR',
                'prod' => null,
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'deliveryCostCoc20DryLess24' => [
            'id' => [
                'dev' => 'UF_CRM_11_DELIVERY_COST_COC_20DRY_LESS_24',
                'prod' => null,
            ],
            'column' => 'E'
        ],
        'deliveryCostCoc20DryMore24' => [
            'id' => [
                'dev' => 'UF_CRM_11_DELIVERY_COST_COC_20DRY_MORE_24',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostCoc40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_11_DELIVERY_COST_COC_40HC',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostSoc20DryLess24' => [
            'id' => [
                'dev' => 'UF_CRM_11_DELIVERY_COST_SOC_20DRY_LESS_24',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostSoc20DryMore24' => [
            'id' => [
                'dev' => 'UF_CRM_11_DELIVERY_COST_SOC_20DRY_MORE_24',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostSoc40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_11_DELIVERY_COST_SOC_40HC',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'securityCost20Dry' => [
            'id' => [
                'dev' => 'UF_CRM_11_SECURITY_COST_20DRY',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'securityCost40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_11_SECURITY_COST_40HC',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryPriceValidFrom' => [
            'id' => [
                'dev' => 'UF_CRM_11_DELIVERY_PRICE_VALID_FROM',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => false,
            ],
        ],
        'deliveryPriceValidTill' => [
            'id' => [
                'dev' => 'UF_CRM_11_DELIVERY_PRICE_VALID_TILL',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'comment' => [
            'id' => [
                'dev' => 'UF_CRM_11_COMMENT',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
    ],
];