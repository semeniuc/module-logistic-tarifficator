<?php

declare(strict_types=1);

namespace Tarifficator\Repository;

use Bitrix\Crm\Item;
use Bitrix\Crm\Service\Container;
use Bitrix\Crm\Service\Factory;
use Bitrix\Main\Loader;

class EntityRepository
{
    private Container $container;

    public function __construct()
    {
        (Loader::includeModule('crm')) ?: die();
        $this->container = Container::getInstance();
    }

    public function getItems(int $entityTypeId, array $params = []): array
    {
        if ($items = $this->getObjects($entityTypeId, $params)) {
            foreach ($items as $item) {
                $result[] = $item->getData();
            }
        }

        return $result ?? [];
    }

    /**
     * @param int $entityTypeId
     * @return Item []
     */
    private function getObjects(int $entityTypeId, array $params): array
    {
        $factory = $this->container->getFactory($entityTypeId);
        return $factory->getItems($params);
    }

}