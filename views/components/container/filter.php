<?php

/**
 * @var \Tarifficator\DTO\Filter\ContainerFilterDTO $filter
 */

?>

<form id="container-form" class="mb-4">
    <div class="ui-form row">
        <!-- Порт назначения -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="container-destination" class="ui-ctl-label-text">Пункт назначения *</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="container-destination" class="ui-ctl-element" name="destination">
                        <option value="">
                            Выбрать город
                        </option>
                        <?php
                        foreach ($filter->getDestinations() as $destination) {
                            ?>
                            <option value="<?= $destination ?>"><?= $destination ?></option>
                            <?php
                        } ?>
                    </select>
                </div>
            </div>
        </div>


        <!-- Собственность -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="container-ownership" class="ui-ctl-label-text">Собственность *</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="container-ownership" class="ui-ctl-element" name="containerOwner">
                        <option value="">
                            Выбрать принадлежность
                        </option>
                        <?php
                        foreach ($filter->getContainerOwners() as $containerOwner) {
                            ?>
                            <option value="<?= $containerOwner ?>">
                                <?= mb_convert_case($containerOwner, MB_CASE_UPPER) ?></option>
                            <?php
                        } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Контейнер -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="container-container" class="ui-ctl-label-text">Контейнер *</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="container-container" class="ui-ctl-element" name="containerType">
                        <option value="">
                            Выбрать размер
                        </option>
                        <?php
                        foreach ($filter->getContainerTypes() as $containerType) {
                            ?>
                            <option value="<?= $containerType ?>">
                                <?= mb_convert_case($containerType, MB_CASE_UPPER) ?></option>
                            <?php
                        } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Арендодатель -->
        <div class="col-md-2">
            <div class="ui-form-label">
                <label for="container-contractor" class="ui-ctl-label-text">Арендодатель</label>
            </div>
            <div class="ui-form-content">
                <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                    <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                    <select id="container-contractor" class="ui-ctl-element" name="contractor">
                        <option value="">
                            Выбрать арендодателя
                        </option>
                        <?php
                        foreach ($filter->getContractors() as $contractor) {
                            ?>
                            <option value="<?= $contractor ?>"><?= $contractor ?></option>
                            <?php
                        } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</form>
