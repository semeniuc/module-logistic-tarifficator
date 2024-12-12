<?php

return [
    'entityType' => [
        'dev' => 1050,
        'prod' => null,
    ],
    'fields' => [
        'pol' => [
            'id' => [
                'dev' => 'UF_CRM_9_POL',
                'prod' => null,
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'pod' => [
            'id' => [
                'dev' => 'UF_CRM_9_POD',
                'prod' => null,
            ],
            'view' => [
                'filter' => true,
                'list' => false,
            ],
        ],
        'destination' => [
            'id' => [
                'dev' => 'UF_CRM_9_DESTINATION',
                'prod' => null,
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'terminal' => [
            'id' => [
                'dev' => 'UF_CRM_9_TERMINAL',
                'prod' => null,
            ],
            'view' => [
                'filter' => true,
                'list' => true,
            ],
        ],
        'contractor' => [
            'id' => [
                'dev' => 'UF_CRM_9_CONTRACTOR',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'route' => [
            'id' => [
                'dev' => 'UF_CRM_9_ROUTE',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostCoc20Dry' => [
            'id' => [
                'dev' => 'UF_CRM_9_DELIVERY_COST_COC_20DRY',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostCoc40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_9_DELIVERY_COST_COC_40HC',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostSoc20Dry' => [
            'id' => [
                'dev' => 'UF_CRM_9_DELIVERY_COST_SOC_20DRY',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryCostSoc40Hc' => [
            'id' => [
                'dev' => 'UF_CRM_9_DELIVERY_COST_SOC_40HC',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'deliveryPriceValidFrom' => [
            'id' => [
                'dev' => 'UF_CRM_9_DELIVERY_PRICE_VALID_FROM',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => false,
            ],
        ],
        'deliveryPriceValidTill' => [
            'id' => [
                'dev' => 'UF_CRM_9_DELIVERY_PRICE_VALID_TILL',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'conversion' => [
            'id' => [
                'dev' => 'UF_CRM_9_CONVERSION',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
        'comment' => [
            'id' => [
                'dev' => 'UF_CRM_9_COMMENT',
                'prod' => null,
            ],
            'view' => [
                'filter' => false,
                'list' => true,
            ],
        ],
    ],
];