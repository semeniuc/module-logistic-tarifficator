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
                terminal: $filter['terminal'] ?? '',
                destination: $filter['destination'] ?? '',
                containerOwner: $filter['containerOwner'] ?? '',
                containerType: $filter['containerType'] ?? '',
            ),
            'rail' => $listService->getRailListService(
                terminal: $filter['terminal'] ?? '',
                destination: $filter['destination'] ?? '',
                station: $filter['station'] ?? '',
                containerOwner: $filter['containerOwner'] ?? '',
                containerType: $filter['containerType'] ?? '',
            ),
            'auto' => $listService->getAutoListService(
                destination: $filter['destination'] ?? '',
                terminal: $filter['terminal'] ?? '',
                containerOwner: $filter['containerOwner'] ?? '',
                containerType: $filter['containerType'] ?? '',
            ),
            'container' => $listService->getContainerListService(
                destination: $filter['destination'] ?? '',
                contractor: $filter['contractor'] ?? '',
                containerOwner: $filter['containerOwner'] ?? '',
                containerType: $filter['containerType'] ?? '',
            ),
            default => [],
        };
    }
}