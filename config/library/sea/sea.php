<?php

return [
    'entityType' => [
        'dev' => 163,
        'prod' => 1066,
    ],
    'fields' => [
        'pol' => [
            'id' => [
                'dev' => 'UF_CRM_4_POL',
                'prod' => 'UF_CRM_12_POL',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'pod' => [
            'id' => [
                'dev' => 'UF_CRM_4_POD',
                'prod' => 'UF_CRM_12_POD',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'terminal' => [
            'id' => [
                'dev' => 'UF_CRM_4_TERMINAL',
                'prod' => 'UF_CRM_12_TERMINAL',
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'contractor' => [
            'id' => [
                'dev' => 'UF_CRM_4_CONTRACTOR',
                'prod' => 'UF_CRM_12_CONTRACTOR',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'route' => [
            'id' => [
                'dev' => 'UF_CRM_4_ROUTE',
                'prod' => 'UF_CRM_12_ROUTE',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostCoc20Dry' => [
            'id' => [
                'dev' => 'UF_CRM_4_DELIVERY_COST_COC_20DRY',
                'prod' => 'UF_CRM_12_DELIVERY_COST_COC_20DRY',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostCoc40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_4_DELIVERY_COST_COC_40HC',
                'prod' => 'UF_CRM_12_DELIVERY_COST_COC_40HC',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostSoc20Dry' => [
            'id' => [
                'dev' => 'UF_CRM_4_DELIVERY_COST_SOC_20DRY',
                'prod' => 'UF_CRM_12_DELIVERY_COST_SOC_20DRY',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostSoc40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_4_DELIVERY_COST_SOC_40HC',
                'prod' => 'UF_CRM_12_DELIVERY_COST_SOC_40HC',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryPriceValidFrom' => [
            'id' => [
                'dev' => 'UF_CRM_4_DELIVERY_PRICE_VALID_FROM',
                'prod' => 'UF_CRM_12_DELIVERY_PRICE_VALID_FROM',
            ],
            'view' => [
                'filter' => false,
                'list' => false,
            ],
        ],
        'deliveryPriceValidTill' => [
            'id' => [
                'dev' => 'UF_CRM_4_DELIVERY_PRICE_VALID_TILL',
                'prod' => 'UF_CRM_12_DELIVERY_PRICE_VALID_TILL',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'conversion' => [
            'id' => [
                'dev' => 'UF_CRM_4_CONVERSION',
                'prod' => 'UF_CRM_12_CONVERSION',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'comment' => [
            'id' => [
                'dev' => 'UF_CRM_4_COMMENT',
                'prod' => 'UF_CRM_12_COMMENT',
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
    ],
];