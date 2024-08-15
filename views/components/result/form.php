<?php

?>

<form id="result-form" class="mb-4">
    <div class="row">
        <!-- Секция "Фрахт" -->
        <div class="col-3 mb-3">
            <div class="row">
                <h5>Фрахт</h5>
            </div>
            <div class="row">
                <div class="col-8">
                    <label for="result-sea-cost" class="form-label">Сумма</label>
                    <input id="result-sea-cost" class="form-control" name="sea-cost" value="135 000 ₽" disabled>
                </div>
                <div class="col-4">
                    <label for="result-sea-commission" class="form-label">Комиссия</label>
                    <input id="result-sea-commission" class="form-control" name="sea-commission" placeholder="0">
                    <small class="text-muted">Введите %</small>
                </div>
            </div>
        </div>

        <!-- Секция "ЖД" -->
        <div class="col-3 mb-3">
            <div class="row">
                <h5>ЖД</h5>
            </div>
            <div class="row">
                <div class="col-8">
                    <label for="result-rail-cost" class="form-label">Сумма</label>
                    <input id="result-rail-cost" class="form-control" name="rail-cost" value="99 500 ₽" disabled>
                </div>
                <div class="col-4">
                    <label for="result-rail-commission" class="form-label">Комиссия</label>
                    <input id="result-rail-commission" class="form-control" name="rail-commission" placeholder="0">
                    <small class="text-muted">Введите %</small>
                </div>
            </div>
        </div>

        <!-- Секция "Авто" -->
        <div class="col-3 mb-3">
            <div class="row">
                <h5>Авто</h5>
            </div>
            <div class="row">
                <div class="col-8">
                    <label for="result-auto-cost" class="form-label">Сумма</label>
                    <input id="result-auto-cost" class="form-control" name="auto-cost" value="18 750 ₽" disabled>
                </div>
                <div class="col-4">
                    <label for="result-auto-commission" class="form-label">Комиссия</label>
                    <input id="result-auto-commission" class="form-control" name="auto-commission" placeholder="0">
                    <small class="text-muted">Введите %</small>
                </div>
            </div>
        </div>

        <!-- Секция "Аренда" -->
        <div class="col-3 mb-3">
            <div class="row">
                <h5>Drop Off</h5>
            </div>
            <div class="row">
                <div class="col-8">
                    <label for="result-auto-cost" class="form-label">Сумма</label>
                    <input id="result-auto-cost" class="form-control" name="auto-cost" value="18 750 ₽" disabled>
                </div>
            </div>
        </div>
    </div>

    <!-- Секция "Итого" -->
    <div class="row">
        <div class="col-12">
            <div class="row">
                <h5>Стоимость</h5>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="result-rental-cost" class="form-label">Сумма</label>
                    <input id="result-rental-cost" class="form-control" name="rental-cost" value="29 200 ₽" disabled>
                    <small class="text-muted">Итоговая сумма</small>
                </div>
                <div class="col-1 offset-col-1">
                    <label for="result-margin-commission" class="form-label">Маржа</label>
                    <input id="result-margin-commission" class="form-control" name="margin-commission" placeholder="0">
                    <small class="text-muted">Введите %</small>
                </div>
                <div class="col-2">
                    <label for="exchange-rate" class="form-label">Текущий курс USD</label>
                    <input id="exchange-rate" class="form-control" name="exchange-rate" value="86,33"
                           disabled>
                    <small class="text-muted">31.07.2024</small>
                </div>
            </div>
        </div>
    </div>
</form>