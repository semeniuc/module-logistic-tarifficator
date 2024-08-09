<?php

declare(strict_types=1);

namespace App\Controller\Api\Filter;

use App\Kernel\Controller\Controller;

class ApiGetFilterDataController extends Controller
{
    public function execute(): void
    {
        $this->response()->send(
            content: json_encode([
                'result' => $result ?? [],
                'class' => 'ApiGetFilterDataController',
            ]),
            headers:['Content-Type' => 'application/json']
        );
    }
}