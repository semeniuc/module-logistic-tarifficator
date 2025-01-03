<?php

declare(strict_types=1);

namespace Tarifficator\Service\List;

use Tarifficator\Service\AbstractItemsService;

abstract class AbstractListService extends AbstractItemsService
{
    public function __construct()
    {
        parent::__construct();
    }

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

    protected function isActive(string $value): bool
    {
        if (!empty($value)) {
            if ($timestamp = strtotime($value)) {
                return date('Y-m-d', $timestamp) >= date('Y-m-d');
            }

            return true;
        }

        return false;
    }

    protected function getCost(int|string $value, string $currency = '₽'): string
    {
        if ($value) {
            $result = str_replace(['.', ','], '', $value);
            $result = number_format(
                num: (floatval($result)),
                thousands_separator: ' ',
            );
            return $result . ' ' . $currency;
        }

        return 0 . ' ' . $currency;
    }

    protected function getFloat(?string $value): string
    {
        if ($value) {
            $value = floatval($value);
            return (string)$value;
        }

        return '0';
    }
}