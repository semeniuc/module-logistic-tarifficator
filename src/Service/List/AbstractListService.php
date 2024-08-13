<?php

declare(strict_types=1);

namespace App\Service\List;

use App\Service\AbstractItemsService;

abstract class AbstractListService extends AbstractItemsService
{
    public function __construct()
    {
        parent::__construct();
    }

//    abstract public function getList(...$ar): array;

    protected function getFieldsToFilter(string $type): array
    {
        $fields = (include APP_PATH . '/config/fields/' . $type . '.php');
        $result = [];

        foreach ($fields as $key => $field) {
            if ($field['view']['filter']) {
                $result[$key] = $field['id'][APP_ENV];
            }
        }

        return $result;
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

    protected function getDate(string $value, string $format = 'Y-m-d'): string
    {
        if (!empty($value) && $timestamp = strtotime($value)) {
            return date($format, $timestamp);
        }

        return $value;
    }
}