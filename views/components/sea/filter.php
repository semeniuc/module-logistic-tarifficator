<?php

/**
 * @var \App\DTO\Filter\SeaFilterDTO $filter
 */

?>

<form id="sea-form" class="mb-4">
    <div>
        <label for="sea-departure-port" class="form-label">Порт отправления:</label>
        <select id="sea-departure-port" class="form-select">
            <?php
            foreach ($filter->getPols() as $pol) {
                ?> <option value="<?= $pol ?>"><?= $pol ?></option>
           <?php }?>
        </select>
    </div>
    <div>
        <label for="sea-destination-port" class="form-label">Порт назначения:</label>
        <select id="sea-destination-port" class="form-select">
            <?php
            foreach ($filter->getPods() as $pod) {
                ?> <option value="<?= $pod ?>"><?= $pod ?></option>
            <?php }?>
        </select>
    </div>
    <div>
        <label for="sea-destination-point" class="form-label">Пункт назначения:</label>
        <select id="sea-destination-point" class="form-select">
            <?php
            foreach ($filter->getDestinations() as $destination) {
                ?> <option value="<?= $destination ?>"><?= $destination ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-select-small">
        <label for="sea-ownership" class="form-label">Собственность:</label>
        <select id="sea-ownership" class="form-select">
            <?php
            foreach ($filter->getContainerOwners()as $containerOwner) {
                ?> <option value="<?= $containerOwner ?>"><?= mb_convert_case($containerOwner, MB_CASE_UPPER) ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-select-small"">
    <label for="sea-container" class="form-label">Контейнер:</label>
    <select id="sea-container" class="form-select">
        <?php
        foreach ($filter->getContainerTypes() as $containerType) {
            ?> <option value="<?= $containerType ?>"><?= mb_convert_case($containerType, MB_CASE_UPPER) ?></option>
        <?php }?>
    </select>
    </div>
</form>
