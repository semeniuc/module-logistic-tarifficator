<?php

declare(strict_types=1);

namespace App\Controller\Api\Filter;

use App\Kernel\Controller\Controller;

class ApiGetListDataController extends Controller
{
    public function execute(): void
    {
        $content = $this->prepareResponse($this->request()->post);

        $this->response()->send(
            content: json_encode($content),
            headers:['Content-Type' => 'application/json']
        );
    }

    private function getEntityName(): string
    {
        return "";
    }

    private function prepareResponse(array $post): array
    {
        return [];
    }
}