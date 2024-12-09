<?php

/**
 * @var \Tarifficator\DTO\Filter\SeaFilterDTO $filter
 */

?>

<form id="sea-form" class="mb-4">
    <div class="ui-form row">
        <!-- Порт отправления -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="sea-departure-port" class="ui-ctl-label-text">Порт отправления *</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="sea-departure-port" class="ui-ctl-element" name="pol" required>
                        <option value="">
                            Выбрать порт
                        </option>
                        <?php
                        foreach ($filter->getPols() as $pol) {
                            ?>
                            <option value="<?= htmlspecialchars($pol) ?>"><?= $pol ?></option>
                            <?php
                        } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Порт назначения -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="sea-destination" class="ui-ctl-label-text">Пункт назначения</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="sea-destination" class="ui-ctl-element" name="destination">
                        <option value="">
                            Выбрать пункт
                        </option>
                        <?php
                        foreach ($filter->getDestinations() as $destination) {
                            ?>
                            <option value="<?= htmlspecialchars($destination) ?>"><?= $destination ?></option>
                            <?php
                        } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Терминал выгрузки -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="sea-terminal" class="ui-ctl-label-text">Терминал выгрузки</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="sea-terminal" class="ui-ctl-element" name="terminal">
                        <option value="">
                            Выбрать терминал
                        </option>
                        <?php
                        foreach ($filter->getTerminals() as $terminal) {
                            ?>
                            <option value="<?= htmlspecialchars($terminal) ?>"><?= $terminal ?></option>
                            <?php
                        } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Собственность -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="sea-ownership" class="ui-ctl-label-text">Собственность *</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="sea-ownership" class="ui-ctl-element" name="containerOwner" required>
                        <option value="">
                            Выбрать принадлежность
                        </option>
                        <?php
                        foreach ($filter->getContainerOwners() as $containerOwner) {
                            ?>
                            <option value="<?= htmlspecialchars($containerOwner) ?>"><?= mb_convert_case($containerOwner, MB_CASE_UPPER) ?></option>
                            <?php
                        } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Контейнер -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="sea-container" class="ui-ctl-label-text">Контейнер *</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="sea-container" class="ui-ctl-element" name="containerType" required>
                        <option value="">
                            Выбрать размер
                        </option>
                        <?php
                        foreach ($filter->getContainerTypes() as $containerType) {
                            ?>
                            <option value="<?= htmlspecialchars($containerType) ?>"><?= mb_convert_case($containerType, MB_CASE_UPPER) ?></option>
                            <?php
                        } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</form>
