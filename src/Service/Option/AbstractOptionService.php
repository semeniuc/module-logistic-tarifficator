<?php

namespace Tarifficator\Service\Option;

use Tarifficator\Service\AbstractItemsService;

class AbstractOptionService extends AbstractItemsService
{
    public function __construct()
    {
        parent::__construct();
    }
    
    protected function getFieldsToFilter(string $category, string $type): array
    {
        $result = [];

        $pathToFile = APP_PATH . "/config/library/{$category}/{$type}.php";
        if (file_exists($pathToFile)) {
            $fields = (include $pathToFile)['fields'];

            if (!empty($fields)) {
                foreach ($fields as $key => $field) {
                    if ($field['view']['filter']) {
                        $result[$key] = $field['id'][APP_ENV];
                    }
                }
            }
        }

        return $result;
    }
}