<?php

declare(strict_types=1);

namespace Tarifficator\Controller\Api;

use Tarifficator\Kernel\Controller\Controller;
use Tarifficator\Service\List\ListService;

class ApiGetListDataController extends Controller
{
    public function execute(): void
    {
        $content = $this->prepareResponse();

        $this->response()->send(
            content: json_encode($content),
            headers: ['Content-Type' => 'application/json']
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
            'rail' => $listService->getRailListService(
                departureStation: $filter['departureStation'] ?? '',
                destinationPoint: $filter['destinationPoint'] ?? '',
                destinationStation: $filter['destinationStation'] ?? '',
                containerOwner: $filter['containerOwner'] ?? '',
                containerType: $filter['containerType'] ?? '',
            ),
            'auto' => $listService->getAutoListService(
                station: $filter['station'] ?? '',
                point: $filter['point'] ?? '',
                containerOwner: $filter['containerOwner'] ?? '',
                containerType: $filter['containerType'] ?? '',
            ),
            'container' => $listService->getContainerListService(
                destination: $filter['destination'] ?? '',
                containerOwner: $filter['containerOwner'] ?? '',
                containerType: $filter['containerType'] ?? '',
            ),
            default => [],
        };
    }
}