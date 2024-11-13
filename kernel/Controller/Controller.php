<?php

declare(strict_types=1);

namespace Tarifficator\Kernel\Controller;

use Tarifficator\Kernel\Exceptions\ViewNotFoundException;
use Tarifficator\Kernel\Http\Request;
use Tarifficator\Kernel\Http\Response;
use Tarifficator\Kernel\View\View;

abstract class Controller
{
    private Request $request;
    private Response $response;
    private View $view;

    public function request(): Request
    {
        return $this->request;
    }

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function response(): Response
    {
        return $this->response;
    }

    public function setResponse(Response $response): void
    {
        $this->response = $response;
    }

    /**
     * @throws ViewNotFoundException
     */
    public function view(string $name, array $data = []): void
    {
        $this->view->page($name, $data);
    }

    public function setView(View $view): void
    {
        $this->view = $view;
    }
}