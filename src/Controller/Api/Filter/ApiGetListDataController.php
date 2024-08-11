<?php

declare(strict_types=1);

namespace App\Controller\Api\Filter;

use App\Kernel\Controller\Controller;

class ApiGetListDataController extends Controller
{
    public function execute(): void
    {
        $result = $this->request()->post;

        $this->response()->send(
            content: json_encode([
                'result' => $result ?? [],
                'class' => 'ApiGetListDataController',
            ]),
            headers:['Content-Type' => 'application/json']
        );
    }
}