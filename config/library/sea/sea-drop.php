<?php

return [
    'entityType' => [
        'dev' => 1054,
        'prod' => 1052,
    ],
    'fields' => [
        'pol' => [
            'id' => [
                'dev' => 'UF_CRM_10_POL',
                'prod' => 'UF_CRM_9_POL',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'pod' => [
            'id' => [
                'dev' => 'UF_CRM_10_POD',
                'prod' => 'UF_CRM_9_POD',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'destination' => [
            'id' => [
                'dev' => 'UF_CRM_10_DESTINATION',
                'prod' => 'UF_CRM_9_DESTINATION',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'terminal' => [
            'id' => [
                'dev' => 'UF_CRM_10_TERMINAL',
                'prod' => 'UF_CRM_9_TERMINAL',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'contractor' => [
            'id' => [
                'dev' => 'UF_CRM_10_CONTRACTOR',
                'prod' => 'UF_CRM_9_CONTRACTOR',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'route' => [
            'id' => [
                'dev' => 'UF_CRM_10_ROUTE',
                'prod' => 'UF_CRM_9_ROUTE',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostCoc20Dry' => [
            'id' => [
                'dev' => 'UF_CRM_10_DELIVERY_COST_COC_20DRY',
                'prod' => 'UF_CRM_9_DELIVERY_COST_COC_20DRY',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostCoc40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_10_DELIVERY_COST_COC_40HC',
                'prod' => 'UF_CRM_9_DELIVERY_COST_COC_40HC',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostSoc20Dry' => [
            'id' => [
                'dev' => 'UF_CRM_10_DELIVERY_COST_SOC_20DRY',
                'prod' => 'UF_CRM_9_DELIVERY_COST_SOC_20DRY',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostSoc40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_10_DELIVERY_COST_SOC_40HC',
                'prod' => 'UF_CRM_9_DELIVERY_COST_SOC_40HC',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryPriceValidFrom' => [
            'id' => [
                'dev' => 'UF_CRM_10_DELIVERY_PRICE_VALID_FROM',
                'prod' => 'UF_CRM_9_DELIVERY_PRICE_VALID_FROM',
            ],
            'view' => [
                'filter' => false,
                'list' => false,
            ],
        ],
        'deliveryPriceValidTill' => [
            'id' => [
                'dev' => 'UF_CRM_10_DELIVERY_PRICE_VALID_TILL',
                'prod' => 'UF_CRM_9_DELIVERY_PRICE_VALID_TILL',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'conversion' => [
            'id' => [
                'dev' => 'UF_CRM_10_CONVERSION',
                'prod' => 'UF_CRM_9_CONVERSION',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'comment' => [
            'id' => [
                'dev' => 'UF_CRM_10_COMMENT',
                'prod' => 'UF_CRM_9_COMMENT',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
    ],
];