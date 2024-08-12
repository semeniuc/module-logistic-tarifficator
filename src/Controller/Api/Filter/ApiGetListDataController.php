<?php

declare(strict_types=1);

namespace App\Controller\Api\Filter;

use App\Kernel\Controller\Controller;
use App\Service\List\ListService;

class ApiGetListDataController extends Controller
{
    public function execute(): void
    {
        $content = $this->prepareResponse();

        $this->response()->send(
            content: json_encode($content),
            headers:['Content-Type' => 'application/json']
        );
    }

    private function prepareResponse(): array
    {
        $filterId = str_replace('-form', '', $this->request()->post['formId']);
        return $this->getListData($filterId, $this->request()->post['fields']);
    }

    private function getListData(string $filterId, array $filter): array
    {
        $listService = new ListService();

        return match ($filterId) {
            'sea' => $listService->getSeaListService(
                pol: $filter['pol'] ?? '',
                pod: $filter['pod'] ?? '',
                destination: $filter['destination'] ?? '',
                containerOwner: $filter['containerOwner'] ?? '',
                containerType: $filter['containerType'] ?? '',
            ),
            default => [],
        };
    }
}