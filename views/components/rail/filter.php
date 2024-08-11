<?php

/**
 * @var \App\DTO\Filter\RailwayFilterDTO $filter
 */

?>

<form id="rail-form" class="mb-4">
    <div>
        <label for="rail-departure-station" class="form-label">Станция отправления:</label>
        <select id="rail-departure-station" class="form-select" name="pod">
            <?php
            foreach ($filter->getPods() as $pod) {
                ?> <option value="<?= $pod ?>"><?= $pod ?></option>
            <?php }?>
        </select>
    </div>
    <div>
        <label for="rail-destination-station" class="form-label">Станция назначения:</label>
        <select id="rail-destination-station" class="form-select" name="destination">
            <?php
            foreach ($filter->getDestinations() as $destination) {
                ?> <option value="<?= $destination ?>"><?= $destination ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-select-small">
        <label for="rail-ownership" class="form-label">Собственность:</label>
        <select id="rail-ownership" class="form-select" name="containerOwner">
            <?php
            foreach ($filter->getContainerOwners()as $containerOwner) {
                ?> <option value="<?= $containerOwner ?>"><?= mb_convert_case($containerOwner, MB_CASE_UPPER) ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-select-small">
        <label for="rail-container" class="form-label">Контейнер:</label>
        <select id="rail-container" class="form-select disabled" name="containerType">
            <?php
            foreach ($filter->getContainerTypes() as $containerType) {
                ?> <option value="<?= $containerType ?>"><?= mb_convert_case($containerType, MB_CASE_UPPER) ?></option>
            <?php }?>
        </select>
    </div>
</form>
