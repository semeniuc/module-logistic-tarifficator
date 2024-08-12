<?php

/**
 * @var \App\DTO\Filter\RailwayFilterDTO $filter
 */

?>

<form id="auto-form" class="mb-4">
    <div>
        <label for="auto-departure-station" class="form-label">Станция отправления:</label>
        <select id="auto-departure-station" class="form-select" name="pod">
            <?php
            foreach ($filter->getPods() as $pod) {
                ?>
                <option value="<?= $pod ?>"><?= $pod ?></option>
                <?php
            } ?>
        </select>
    </div>
    <div>
        <label for="auto-destination-station" class="form-label">Станция назначения:</label>
        <select id="auto-destination-station" class="form-select" name="destination">
            <?php
            foreach ($filter->getDestinations() as $destination) {
                ?>
                <option value="<?= $destination ?>"><?= $destination ?></option>
                <?php
            } ?>
        </select>
    </div>
    <div class="form-select-small">
        <label for="auto-ownership" class="form-label">Собственность:</label>
        <select id="auto-ownership" class="form-select" name="containerOwner">
            <?php
            foreach ($filter->getContainerOwners() as $containerOwner) {
                ?>
                <option value="<?= $containerOwner ?>"><?= mb_convert_case($containerOwner, MB_CASE_UPPER) ?></option>
                <?php
            } ?>
        </select>
    </div>
    <div class="form-select-small">
        <label for="auto-container" class="form-label">Контейнер:</label>
        <select id="auto-container" class="form-select disabled" name="containerType">
            <?php
            foreach ($filter->getContainerTypes() as $containerType) {
                ?>
                <option value="<?= $containerType ?>"><?= mb_convert_case($containerType, MB_CASE_UPPER) ?></option>
                <?php
            } ?>
        </select>
    </div>
</form>
