<?php

/**
 * @var \Tarifficator\DTO\Filter\RailwayFilterDTO $filter
 */

?>

<form id="rail-form" class="mb-4">
    <div class="ui-form row">
        <!-- Терминал выгрузки -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="rail-terminal" class="ui-ctl-label-text">Терминал выгрузки *</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="rail-terminal" class="ui-ctl-element" name="terminal">
                        <option value="">
                            Выбрать терминал
                        </option>
                        <?php
                        foreach ($filter->getTerminals() as $terminal) {
                            ?>
                            <option value="<?= $terminal ?>"><?= $terminal ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Пункт назначения -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="rail-destination" class="ui-ctl-label-text">Пункт назначения</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="rail-destination" class="ui-ctl-element" name="destination">
                        <option value="">
                            Выбрать город
                        </option>
                        <?php
                        foreach ($filter->getDestinations() as $destination) {
                            ?>
                            <option value="<?= $destination ?>"><?= $destination ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Станция назначения -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="rail-station" class="ui-ctl-label-text">Станция назначения</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="rail-station" class="ui-ctl-element" name="station">
                        <option value="">
                            Выбрать станцию
                        </option>
                        <?php
                        foreach ($filter->getStations() as $station) {
                            ?>
                            <option value="<?= $station ?>"><?= $station ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Собственность -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="rail-ownership" class="ui-ctl-label-text">Собственность *</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="rail-ownership" class="ui-ctl-element" name="containerOwner">
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
                <label for="rail-container" class="ui-ctl-label-text">Контейнер *</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="rail-container" class="ui-ctl-element" name="containerType">
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

                <div class="ui-form-label" data-form-row-hidden="">
                    <label class="ui-ctl ui-ctl-checkbox">
                        <input type="checkbox" id='rail-security' class="ui-ctl-element">
                        <div class="ui-ctl-label-text">Охрана</div>
                    </label>
                </div>
            </div>
        </div>
    </div>
</form>
