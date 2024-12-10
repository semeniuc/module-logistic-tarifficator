<?php

return [
    'entityType' => [
        'dev' => 162,
        'prod' => 1036,
    ],
    'fields' => [
        'terminal' => [
            'id' => [
                'dev' => 'UF_CRM_5_TERMINAL',
                'prod' => null,
            ],
            'view' => [
                'filter' => true,
                'list' => false,
            ],
        ],
        'destination' => [
            'id' => [
                'dev' => 'UF_CRM_5_DESTINATION',
                'prod' => null,
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'station' => [
            'id' => [
                'dev' => 'UF_CRM_5_STATION',
                'prod' => 'UF_CRM_5_STATION',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'contractor' => [
            'id' => [
                'dev' => 'UF_CRM_5_CONTRACTOR',
                'prod' => 'UF_CRM_5_CONTRACTOR',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'deliveryCostCoc20DryLess24' => [
            'id' => [
                'dev' => 'UF_CRM_5_DELIVERY_COST_COC_20DRY_LESS_24',
                'prod' => 'UF_CRM_5_DELIVERY_COST_COC_20DRY_LESS_24',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostCoc20DryMore24' => [
            'id' => [
                'dev' => 'UF_CRM_5_DELIVERY_COST_COC_20DRY_MORE_24',
                'prod' => 'UF_CRM_5_DELIVERY_COST_COC_20DRY_MORE_24',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostCoc40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_5_DELIVERY_COST_COC_40HC',
                'prod' => 'UF_CRM_5_DELIVERY_COST_COC_40HC',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostSoc20DryLess24' => [
            'id' => [
                'dev' => 'UF_CRM_5_DELIVERY_COST_SOC_20DRY_LESS_24',
                'prod' => 'UF_CRM_5_DELIVERY_COST_SOC_20DRY_LESS_24',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostSoc20DryMore24' => [
            'id' => [
                'dev' => 'UF_CRM_5_DELIVERY_COST_SOC_20DRY_MORE_24',
                'prod' => 'UF_CRM_5_DELIVERY_COST_SOC_20DRY_MORE_24',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostSoc40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_5_DELIVERY_COST_SOC_40HC',
                'prod' => 'UF_CRM_5_DELIVERY_COST_SOC_40HC',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'securityCost20Dry' => [
            'id' => [
                'dev' => 'UF_CRM_5_SECURITY_COST_20DRY',
                'prod' => 'UF_CRM_5_SECURITY_COST_20DRY',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'securityCost40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_5_SECURITY_COST_40HC',
                'prod' => 'UF_CRM_5_SECURITY_COST_40HC',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryPriceValidFrom' => [
            'id' => [
                'dev' => 'UF_CRM_5_DELIVERY_PRICE_VALID_FROM',
                'prod' => 'UF_CRM_5_DELIVERY_PRICE_VALID_FROM',
            ],
            'view' => [
                'filter' => false,
                'list' => false,
            ],
        ],
        'deliveryPriceValidTill' => [
            'id' => [
                'dev' => 'UF_CRM_5_DELIVERY_PRICE_VALID_TILL',
                'prod' => 'UF_CRM_5_DELIVERY_PRICE_VALID_TILL',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'comment' => [
            'id' => [
                'dev' => 'UF_CRM_5_COMMENT',
                'prod' => 'UF_CRM_5_COMMENT',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
    ],
];
