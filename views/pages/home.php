<?php

use App\Kernel\View\View;

/**
 * @var View $view
 * @var $data = []
 * @var \App\DTO\Filter\SeaFilterDTO $seaFilter
 * @var \App\DTO\Filter\RailwayFilterDTO $railwayFilter
 * @var \App\DTO\Filter\ContainerFilterDTO $containerFilter
 * */

$view->component('header', $data);

$seaFilter = $data['filters']['sea'];
$railwayFilter = $data['filters']['railway'];
$containerFilter = $data['filters']['container'];


?>

<div class="container">
    <h2 class="title">Морская перевозка</h2>
    <form id="sea-form" class="mb-4">
        <div>
            <label for="sea-departure-port" class="form-label">Порт отправления:</label>
            <select id="sea-departure-port" class="form-select">
                <option value="Владивосток (ВМПТ)">Shanghai</option>
                <option value="Test 2">Test 2</option>
            </select>
        </div>
        <div>
            <label for="sea-destination-port" class="form-label">Порт назначения:</label>
            <select id="sea-destination-port" class="form-select">
                <option value="Владивосток (ВМПТ)">Владивосток (ВМПТ)</option>
                <!-- Добавьте другие порты -->
            </select>
        </div>
        <div>
            <label for="sea-destination-point" class="form-label">Пункт назначения:</label>
            <select id="sea-destination-point" class="form-select">
                <option value="Иркутск">Иркутск</option>
                <!-- Добавьте другие пункты -->
            </select>
        </div>
        <div class="form-select-small">
            <label for="sea-ownership" class="form-label">Собственность:</label>
            <select id="sea-ownership" class="form-select">
                <option value="SOC">SOC</option>
                <!-- Добавьте другие типы собственности -->
            </select>
        </div>
        <div class="form-select-small">
            <label for="sea-container" class="form-label">Контейнер:</label>
            <select id="sea-container" class="form-select">
                <option value="40HC">40HC</option>
                <!-- Добавьте другие контейнеры -->
            </select>
        </div>
    </form>

    <table id="sea-results" class="table table-bordered">
        <thead class="table-light">
        <tr>
            <th>Агент</th>
            <th>Морская линия</th>
            <th>Пункт назначения</th>
            <th>COC/SOC</th>
            <th>Контейнер</th>
            <th>Стоимость</th>
            <th>Срок действия</th>
            <th>Нотация</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>FESCO</td>
            <td>FESCO</td>
            <td>Владивосток</td>
            <td>COC</td>
            <td>20DRY</td>
            <td>2 250</td>
            <td>01.08.2024</td>
            <td>Стоимость услуг не применима к перевозке опасного груза. Стоимость услуг действительна при условии наличия контейнера.</td>
        </tr>
        </tbody>
    </table>

    <h2>ЖД перевозка</h2>
    <form id="rail-form" class="mb-4">
        <div>
            <label for="rail-departure-station" class="form-label">Станция отправления:</label>
            <select id="rail-departure-station" class="form-select">
                <option value="Владивосток (ВМПТ)">Владивосток (ВМПТ)</option>
                <!-- Добавьте другие станции -->
            </select>
        </div>
        <div>
            <label for="rail-destination-station" class="form-label">Станция назначения:</label>
            <select id="rail-destination-station" class="form-select">
                <option value="Москва (Силикатная)">Москва (Силикатная)</option>
                <!-- Добавьте другие станции -->
            </select>
        </div>
        <div class="form-select-small">
            <label for="rail-ownership" class="form-label">Собственность:</label>
            <select id="rail-ownership" class="form-select">
                <option value="COC">COC</option>
                <!-- Добавьте другие типы собственности -->
            </select>
        </div>
        <div class="form-select-small">
            <label for="rail-container" class="form-label">Контейнер:</label>
            <select id="rail-container" class="form-select">
                <option value="20DRY (<24т)">20DRY (<24т)</option>
                <!-- Добавьте другие контейнеры -->
            </select>
        </div>
    </form>

    <table id="rail-results" class="table table-bordered">
        <thead class="table-light">
        <tr>
            <th>Агент</th>
            <th>Пункт назначения</th>
            <th>COC/SOC</th>
            <th>Контейнер</th>
            <th>Стоимость</th>
            <th>Охрана</th>
            <th>Срок действия</th>
            <th>Нотация</th>
        </tr>
        </thead>
        <tbody>
        <!-- Здесь будут отображаться результаты -->
        </tbody>
    </table>

    <h2>Drop Off</h2>
    <form id="dropoff-form" class="mb-4">
        <div>
            <label for="dropoff-destination-point" class="form-label">Пункт назначения:</label>
            <select id="dropoff-destination-point" class="form-select">
                <option value="Москва">Москва</option>
                <!-- Добавьте другие пункты -->
            </select>
        </div>
        <div class="form-select-small">
            <label for="dropoff-ownership" class="form-label">Собственность:</label>
            <select id="dropoff-ownership" class="form-select">
                <option value="COC">COC</option>
                <!-- Добавьте другие типы собственности -->
            </select>
        </div>
        <div class="form-select-small">
            <label for="dropoff-container" class="form-label">Контейнер:</label>
            <select id="dropoff-container" class="form-select">
                <option value="20DRY">20DRY</option>
                <!-- Добавьте другие контейнеры -->
            </select>
        </div>
    </form>

    <table id="dropoff-results" class="table table-bordered">
        <thead class="table-light">
        <tr>
            <th>Пункт назначения</th>
            <th>Арендодатель</th>
            <th>Drop off</th>
            <th>Стоимость</th>
            <th>Срок действия</th>
            <th>Нотация</th>
        </tr>
        </thead>
        <tbody>
        <!-- Здесь будут отображаться результаты -->
        </tbody>
    </table>
</div>




    <?php

    $view->component('footer'); ?>
