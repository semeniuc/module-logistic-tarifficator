<?php

/**
 * @var \App\DTO\Filter\ContainerFilterDTO $filter
 */

?>

<form id="dropoff-form" class="mb-4">
    <div>
        <label for="dropoff-destination-point" class="form-label">Пункт назначения:</label>
        <select id="dropoff-destination-point" class="form-select" name="destination">
            <?php
            foreach ($filter->getDestinations() as $destination) {
                ?> <option value="<?= $destination ?>"><?= $destination ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-select-small">
        <label for="dropoff-ownership" class="form-label">Собственность:</label>
        <select id="dropoff-ownership" class="form-select" name="containerOwner">
            <?php
            foreach ($filter->getContainerOwners()as $containerOwner) {
                ?> <option value="<?= $containerOwner ?>"><?= mb_convert_case($containerOwner, MB_CASE_UPPER) ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-select-small">
        <label for="dropoff-container" class="form-label">Контейнер:</label>
        <select id="dropoff-container" class="form-select disabled" name="containerType" disabled>
            <?php
            foreach ($filter->getContainerTypes() as $containerType) {
                ?> <option value="<?= $containerType ?>"><?= mb_convert_case($containerType, MB_CASE_UPPER) ?></option>
            <?php }?>
        </select>
    </div>
</form>
