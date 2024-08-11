<?php

declare(strict_types=1);

namespace App\Service\List;

use App\DTO\List\ListDTO;

class SeaListService extends AbstractListService
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return ListDTO[]
     */
    public function getList(array $params): array
    {
        $result = $this->entityRepository->getItems($this->entityTypeIds['sea']);

        dd([
            'fields' => $this->getFieldsToList('sea'),
            'sea' => $result,

        ]);

        return [];
    }

    private function getParams()
    {
        
    }

}