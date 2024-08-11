<?php

declare(strict_types=1);

namespace App\Service\List;

use App\Service\AbstractItemsService;

class AbstractListService extends AbstractItemsService
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getFieldsToList(string $type): array
    {
        $fields = (include APP_PATH . '/config/fields/' . $type . '.php');
        $result = [];

        foreach ($fields as $key => $field) {
            if ($field['view']['list']) {
                $result[$key] = $field['id'][APP_ENV];
            }
        }

        return $result;
    }
}