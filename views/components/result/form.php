<?php

?>

<form id="result-form" class="mb-4">
    <!-- Секция "Фрахт" -->
    <div class="row mb-3">
        <div class="col-12">
            <h5>Фрахт</h5>
        </div>
        <div class="col-md-9 no-gutters">
            <label for="result-sea-cost" class="form-label">Сумма</label>
            <input id="result-sea-cost" class="form-control" name="sea-cost" value="135 000 ₽" disabled>
            <small class="text-muted">USD по курсу ЦБ РФ</small>
        </div>
        <div class="col-md-3 no-gutters">
            <label for="result-sea-commission" class="form-label">Комиссия</label>
            <input id="result-sea-commission" class="form-control" name="sea-commission" placeholder="0">
            <small class="text-muted">Введите %</small>
        </div>
    </div>

    <!-- Секция "ЖД" -->
    <div class="row mb-3">
        <div class="col-12">
            <h5>ЖД</h5>
        </div>
        <div class="col-md-9">
            <label for="result-rail-cost" class="form-label">Сумма</label>
            <input id="result-rail-cost" class="form-control" name="rail-cost" value="99 500 ₽" disabled>
        </div>
        <div class="col-md-3">
            <label for="result-rail-commission" class="form-label">Комиссия</label>
            <input id="result-rail-commission" class="form-control" name="rail-commission" placeholder="0">
            <small class="text-muted">Введите %</small>
        </div>
    </div>

    <!-- Секция "Аренда" -->
    <div class="row mb-3">
        <div class="col-12">
            <h5>Аренда</h5>
        </div>
        <div class="col-md-9">
            <label for="result-rental-cost" class="form-label">Сумма</label>
            <input id="result-rental-cost" class="form-control" name="rental-cost" value="29 200 ₽" disabled>
            <small class="text-muted">USD по курсу ЦБ РФ</small>
        </div>
    </div>

    <!-- Секция "Авто" -->
    <div class="row mb-3">
        <div class="col-12">
            <h5>Авто</h5>
        </div>
        <div class="col-md-9">
            <label for="result-auto-cost" class="form-label">Сумма</label>
            <input id="result-auto-cost" class="form-control" name="auto-cost" value="18 750 ₽" disabled>
        </div>
        <div class="col-md-3">
            <label for="result-auto-commission" class="form-label">Комиссия</label>
            <input id="result-auto-commission" class="form-control" name="auto-commission" placeholder="0">
            <small class="text-muted">Введите %</small>
        </div>
    </div>

    <!-- Секция "Итого" -->
    <div class="row mb-3">
        <div class="col-12">
            <h5>Итого</h5>
        </div>
        <div class="col-md-9">
            <label for="result-total" class="form-label">Сумма</label>
            <input id="result-total" class="form-control" name="total" disabled>
        </div>
        <div class="col-md-3">
            <label for="result-margin-commission" class="form-label">Маржа</label>
            <input id="result-margin-commission" class="form-control" name="margin-commission" placeholder="0">
            <small class="text-muted">Введите %</small>
        </div>
    </div>
</form>