<?php

?>

<form id="result-form" class="mb-4">
    <div class="row">
        <!-- Секция "Фрахт" -->
        <div class="col-2 mb-1">
            <h5>Фрахт</h5>
            <div class="d-flex flex-column">
                <div class="mb-2">
                    <label for="result-sea-cost" class="form-label">Сумма</label>
                    <input id="result-sea-cost" class="form-control" name="sea-cost" value="$ 0,00" disabled>
                    <small id="result-sea-cost-rub" class="text-muted"></small>
                </div>
                <div>
                    <label for="result-sea-commission" class="form-label">Комиссия</label>
                    <input id="result-sea-commission" class="form-control" name="sea-commission" placeholder="$ 0,00">
                    <small class="result-sea-commission-rub"></small>
                </div>
            </div>
        </div>

        <!-- Секция "ЖД" -->
        <div class="col-2 mb-1">
            <h5>ЖД</h5>
            <div class="d-flex flex-column">
                <div class="mb-2">
                    <label for="result-rail-cost" class="form-label">Сумма</label>
                    <input id="result-rail-cost" class="form-control" name="rail-cost" value="0,00 ₽" disabled>
                </div>
                <div>
                    <label for="result-rail-commission" class="form-label">Комиссия</label>
                    <input id="result-rail-commission" class="form-control" name="rail-commission" placeholder="0,00 ₽">
                    <small class="text-muted"></small>
                </div>
            </div>
        </div>

        <!-- Секция "Авто" -->
        <div class="col-2 mb-1">
            <h5>Авто</h5>
            <div class="d-flex flex-column">
                <div class="mb-2">
                    <label for="result-auto-cost" class="form-label">Сумма</label>
                    <input id="result-auto-cost" class="form-control" name="auto-cost" placeholder="0,00 ₽">
                </div>
                <!-- <div class="col-12">
                    <label for="result-auto-commission" class="form-label">Комиссия</label>
                    <input id="result-auto-commission" class="form-control" name="auto-commission" placeholder="0" disabled>
                    <small class="text-muted">Введите %</small>
                </div> -->
            </div>
        </div>

        <!-- Секция "Аренда" -->
        <div class="col-2 mb-1">
            <h5>Drop Off</h5>
            <div class="d-flex flex-column">
                <div class="mb-2">
                    <label for="result-rental-cost" class="form-label">Сумма</label>
                    <input id="result-rental-cost" class="form-control" name="rental-cost" value="$ 0,00" disabled>
                </div>
            </div>
        </div>

        <!-- Секция "Итого" -->
        <div class="col-4 mb-1 pl-5">
            <h5>Стоимость</h5>
            <div class="row">
                <div class="col-8 mb-2">
                    <label for="result-total-cost" class="form-label">Сумма</label>
                    <input id="result-total-cost" class="form-control" name="total-cost" value="0 ₽" disabled>
                    <small class="text-muted">Итоговая сумма</small>
                </div>
                <div class="w-100"></div>
                <div class="col-5">
                    <label for="exchange-rate" class="form-label">Курс USD</label>
                    <input id="exchange-rate" class="form-control" name="exchange-rate" value="" disabled>
                    <small id="date-exchange-rate" class="text-muted"></small>
                </div>
            </div>
        </div>
    </div>
</form>