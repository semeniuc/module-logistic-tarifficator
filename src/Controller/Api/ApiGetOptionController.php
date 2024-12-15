<?php

namespace Tarifficator\Controller\Api;

use Tarifficator\Kernel\Controller\Controller;
use Tarifficator\Service\Option\OptionService;

class ApiGetOptionController extends Controller
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
        $category = str_replace('-form', '', $this->request()->post['formId']);
        $sourceSelect = str_replace('-form', '', $this->request()->post['sourceSelect']);
        $sourceSelectOption = str_replace('-form', '', $this->request()->post['sourceSelectOption']);
        $targetSelect = str_replace('-form', '', $this->request()->post['targetSelect']);


        if ($category === 'rail') {
            $category = 'railway';
        }

        $options = $this->getSelectOptions($category, $sourceSelect, $sourceSelectOption, $targetSelect);
        return ['options' => $options];
    }

    private function getSelectOptions(
        string  $category,
        string  $sourceSelect,
        ?string $sourceSelectOption,
        string  $targetSelect
    ): array
    {
        $options = [];

        if ($category && $sourceSelect && $targetSelect) {
            $options = (new OptionService())->getOptions($category, $sourceSelect, $sourceSelectOption, $targetSelect);
        }

        return $options;
    }
}