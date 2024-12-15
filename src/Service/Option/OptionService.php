<?php

namespace Tarifficator\Service\Option;

class OptionService extends AbstractOptionService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getOptions(
        string  $category,
        string  $sourceSelect,
        ?string $sourceSelectOption,
        string  $targetSelect
    ): array
    {
        $options = [];

        if ($this->entityTypeIds[$category]) {
            foreach ($this->entityTypeIds[$category] as $type => $entityTypeId) {

                $fields = $this->getFieldsToFilter($category, $type);
                $sourceFieldId = $fields[$sourceSelect];
                $targetFieldId = $fields[$targetSelect];

                if ($sourceFieldId && $targetFieldId) {
                    $items = $this->getItems($entityTypeId);

                    if ($items) {
                        $data = $this->extractOptions($sourceFieldId, $sourceSelectOption, $targetFieldId, $items);

                        if ($data) {
                            $options = array_merge_recursive($options, $data);
                        }
                    }
                }
            }

            if ($options) {
                $options = array_values(array_unique($options));
                sort($options);
            }
        }

        return $options;
    }

    private function extractOptions(string $sourceFieldId, ?string $sourceSelectOption, string $targetFieldId, array $items): array
    {
        $options = [];

        if ($sourceSelectOption) {
            $sourceSelectOption = mb_strtolower($sourceSelectOption);
            foreach ($items as $item) {
                if (!empty($item[$sourceFieldId]) && mb_strtolower($item[$sourceFieldId]) == $sourceSelectOption) {
                    $options[] = $item[$targetFieldId];
                }
            }
        } else {
            foreach ($items as $item) {
                if (!empty($item[$sourceFieldId])) {
                    $options[] = $item[$targetFieldId];
                }
            }
        }
        
        return $options;
    }
}