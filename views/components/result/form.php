<?php

?>

<form id="result-form">
    <div class="row">
        <!-- Секция "Фрахт" -->
        <div class="col-md-2">
            <div class="ui-form-content">
                <h5>Фрахт</h5>
            </div>
            <div class="ui-form-label">
                <label for="result-sea-cost" class="ui-ctl-label-text">Сумма</label>
            </div>
            <div class="ui-form-content mb-1">
                <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                    <input id="result-sea-cost" type="text" class="ui-ctl-element" name="sea-cost"
                           value="$ 0,00" disabled>
                </div>
            </div>
            <div class="ui-form-label">
                <label for="result-sea-commission" class="ui-ctl-label-text">Комиссия</label>
            </div>
            <div class="ui-form-content mb-1">
                <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                    <input id="result-sea-commission" type="text" class="ui-ctl-element" name="sea-commission"
                           placeholder="$ 0,00">
                    <button class="ui-ctl-after ui-ctl-icon-clear"
                            data-clear-target="result-sea-commission"></button>
                </div>
            </div>
        </div>

        <!-- Секция "ЖД" -->
        <div class="col-md-2">
            <div class="ui-form-content">
                <h5>ЖД</h5>
            </div>
            <div class="ui-form-label">
                <label for="result-rail-cost" class="ui-ctl-label-text">Сумма</label>
            </div>
            <div class="ui-form-content mb-1">
                <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                    <input id="result-rail-cost" type="text" class="ui-ctl-element" name="rail-cost"
                           value="0,00 ₽" disabled>
                </div>
            </div>

            <div class="ui-form-label">
                <label for="result-rail-commission" class="ui-ctl-label-text">Комиссия</label>
            </div>
            <div class="ui-form-content mb-1">
                <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                    <input id="result-rail-commission" type="text" class="ui-ctl-element" name="rail-commission"
                           placeholder="0,00 ₽">
                    <button class="ui-ctl-after ui-ctl-icon-clear"
                            data-clear-target="result-rail-commission"></button>
                </div>
            </div>
        </div>

        <!-- Секция "Авто" -->
        <div class="col-md-2">
            <div class="ui-form-content">
                <h5>Авто</h5>
            </div>
            <div class="ui-form-label">
                <label for="result-auto-cost" class="ui-ctl-label-text">Сумма</label>
            </div>
            <div class="ui-form-content mb-1">
                <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                    <input id="result-auto-cost" type="text" class="ui-ctl-element" name="auto-cost"
                           value="0,00 ₽" disabled>
                </div>
            </div>

            <div class="ui-form-label">
                <label for="result-auto-commission" class="ui-ctl-label-text">Комиссия</label>
            </div>
            <div class="ui-form-content mb-1">
                <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                    <input id="result-auto-commission" type="text" class="ui-ctl-element" name="auto-commission"
                           placeholder="0,00 ₽">
                    <button class="ui-ctl-after ui-ctl-icon-clear"
                            data-clear-target="result-auto-commission"></button>
                </div>
            </div>
        </div>

        <!-- Секция "Аренда" -->
        <div class="col-md-2 border-right">
            <div class="ui-form-content">
                <h5>Drop Off</h5>
            </div>
            <div class="ui-form-label">
                <label for="result-rental-cost" class="ui-ctl-label-text">Сумма</label>
            </div>
            <div class="ui-form-content mb-1">
                <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                    <input id="result-rental-cost" type="text" class="ui-ctl-element" name="rental-cost"
                           value="$ 0,00" disabled>
                </div>
            </div>
            <!--            <div class="ui-form-label">-->
            <!--                <label for="result-rental-commission" class="ui-ctl-label-text">Комиссия</label>-->
            <!--            </div>-->
            <!--            <div class="ui-form-content mb-1">-->
            <!--                <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">-->
            <!--                    <input id="result-rental-commission" type="text" class="ui-ctl-element"-->
            <!--                           name="rental-commission"-->
            <!--                           placeholder="$ 0,00">-->
            <!--                </div>-->
            <!--            </div>-->
        </div>

        <!-- Секция "Итого" -->
        <div class="col-md-2">
            <div class="ui-form-content">
                <h5>Стоимость</h5>
            </div>
            <div class="ui-form-label">
                <label for="result-total-cost" class="ui-ctl-label-text">Итоговая сумма</label>
            </div>
            <div class="ui-form-content mb-1">
                <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                    <input id="result-total-cost" type="text" class="ui-ctl-element" name="total-cost"
                           value="$ 0,00" disabled>
                </div>
            </div>
            <div class="ui-form-label">
                <label for="exchange-rate" class="ui-ctl-label-text">Курс USD</label>
            </div>
            <div class="ui-form-content mb-1">
                <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                    <div id="date-exchange-rate" class="ui-ctl-tag"></div>
                    <input id="exchange-rate" type="text" class="ui-ctl-element" name="exchange-rate"
                           value="" disabled>
                </div>
            </div>
        </div>
    </div>
</form>