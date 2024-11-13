<?php

/**
 * @var \Tarifficator\DTO\Filter\AutoFilterDTO $filter
 */

?>

<form id="auto-form" class="mb-4">
    <div class="ui-form row">
        <!-- Станция назначения -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="auto-station" class="ui-ctl-label-text">Станция назначения</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="auto-station" class="ui-ctl-element" name="station">
                        <option value="">
                            Выбрать станцию
                        </option>
                        <?php
                        foreach ($filter->getStations() as $station) {
                            ?>
                            <option value="<?= $station ?>">
                                <?= $station ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Пункт отправления -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="auto-point" class="ui-ctl-label-text">Пункт назначения</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="auto-point" class="ui-ctl-element" name="point">
                        <option value="">
                            Выбрать пункт
                        </option>
                        <?php
                        foreach ($filter->getPoints() as $point) {
                            ?>
                            <option value="<?= $point ?>"><?= $point ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Собственность -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="auto-ownership" class="ui-ctl-label-text">Собственность</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="auto-ownership" class="ui-ctl-element" name="containerOwner">
                        <option value="">
                            Выбрать принадлежность
                        </option>
                        <?php
                        foreach ($filter->getContainerOwners() as $containerOwner) {
                            ?>
                            <option value="<?= $containerOwner ?>">
                                <?= mb_convert_case($containerOwner, MB_CASE_UPPER) ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Контейнер -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="auto-container" class="ui-ctl-label-text">Контейнер</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="auto-container" class="ui-ctl-element" name="containerType">
                        <option value="">
                            Выбрать размер
                        </option>
                        <?php
                        foreach ($filter->getContainerTypes() as $containerType) {
                            ?>
                            <option value="<?= $containerType ?>">
                                <?= mb_convert_case($containerType, MB_CASE_UPPER) ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Доп. опция -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="rail-container" class="ui-ctl-label-text">Включить в стоимость</label>

                <div class="ui-form-label">
                    <label class="ui-ctl ui-ctl-checkbox">
                        <input type="checkbox" id='accreditation' class="ui-ctl-element">
                        <div class="ui-ctl-label-text">Раскредитация</div>
                    </label>
                </div>
            </div>
        </div>
    </div>
</form>