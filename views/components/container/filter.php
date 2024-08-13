<?php

/**
 * @var \App\DTO\Filter\ContainerFilterDTO $filter
 */

?>

<form id="container-form" class="mb-4">
    <div>
        <label for="container-destination-point" class="form-label">Пункт назначения:</label>
        <select id="container-destination-point" class="form-select" name="destination">
            <?php
            foreach ($filter->getDestinations() as $destination) {
                ?>
                <option value="<?= $destination ?>"><?= $destination ?></option>
                <?php
            } ?>
        </select>
    </div>
    <div class="form-select-small">
        <label for="container-ownership" class="form-label">Собственность:</label>
        <select id="container-ownership" class="form-select" name="containerOwner">
            <?php
            foreach ($filter->getContainerOwners() as $containerOwner) {
                ?>
                <option value="<?= $containerOwner ?>"><?= mb_convert_case($containerOwner, MB_CASE_UPPER) ?></option>
                <?php
            } ?>
        </select>
    </div>
    <div class="form-select-small">
        <label for="container-container" class="form-label">Контейнер:</label>
        <select id="container-container" class="form-select" name="containerType">
            <?php
            foreach ($filter->getContainerTypes() as $containerType) {
                ?>
                <option value="<?= $containerType ?>"><?= mb_convert_case($containerType, MB_CASE_UPPER) ?></option>
                <?php
            } ?>
        </select>
    </div>
</form>
