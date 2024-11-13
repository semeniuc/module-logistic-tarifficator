<?php

declare(strict_types=1);

namespace Tarifficator\Kernel\Container;

use Tarifficator\Kernel\Http\Request;
use Tarifficator\Kernel\Http\Response;
use Tarifficator\Kernel\Router\Router;
use Tarifficator\Kernel\View\View;

class Container
{
    public function __construct(
        public readonly Request $request,
        public readonly Router  $router,
        public readonly View    $view,
    )
    {
    }

    public static function registerServices(): static
    {
        $request = Request::createFromGlobals();
        $response = new Response();
        $view = new View();
        $router = new Router($request, $response, $view);

        return new static(
            $request,
            $router,
            $view
        );
    }
}