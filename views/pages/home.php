<?php

use App\Kernel\View\View;

/**
 * @var View $view
 * @var $data = []
 * */

$view->component('header', $data);

?>

<div class="container">
    <h2>Морская перевозка</h2>
    <form id="sea-form">
        <label for="sea-departure-port">Порт отправления:</label>
        <select id="sea-departure-port">
            <option value="Shanghai">Shanghai</option>
            <!-- Добавьте другие порты -->
        </select>

        <label for="sea-destination-port">Порт назначения:</label>
        <select id="sea-destination-port">
            <option value="Владивосток (ВМПТ)">Владивосток (ВМПТ)</option>
            <!-- Добавьте другие порты -->
        </select>

        <label for="sea-destination-point">Пункт назначения:</label>
        <select id="sea-destination-point">
            <option value="Иркутск">Иркутск</option>
            <!-- Добавьте другие пункты -->
        </select>

        <label for="sea-ownership">Собственность:</label>
        <select id="sea-ownership">
            <option value="SOC">SOC</option>
            <!-- Добавьте другие типы собственности -->
        </select>

        <label for="sea-container">Контейнер:</label>
        <select id="sea-container">
            <option value="40HC">40HC</option>
            <!-- Добавьте другие контейнеры -->
        </select>
    </form>

    <table id="sea-results">
        <thead>
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
        <!-- Здесь будут отображаться результаты -->
        </tbody>
    </table>

    <h2>ЖД перевозка</h2>
    <form id="rail-form">
        <label for="rail-departure-station">Станция отправления:</label>
        <select id="rail-departure-station">
            <option value="Владивосток (ВМПТ)">Владивосток (ВМПТ)</option>
            <!-- Добавьте другие станции -->
        </select>

        <label for="rail-destination-station">Станция назначения:</label>
        <select id="rail-destination-station">
            <option value="Москва (Силикатная)">Москва (Силикатная)</option>
            <!-- Добавьте другие станции -->
        </select>

        <label for="rail-ownership">Собственность:</label>
        <select id="rail-ownership">
            <option value="COC">COC</option>
            <!-- Добавьте другие типы собственности -->
        </select>

        <label for="rail-container">Контейнер:</label>
        <select id="rail-container">
            <option value="20DRY (<24т)">20DRY (<24т)</option>
            <!-- Добавьте другие контейнеры -->
        </select>
    </form>

    <table id="rail-results">
        <thead>
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
    <form id="dropoff-form">
        <label for="dropoff-destination-point">Пункт назначения:</label>
        <select id="dropoff-destination-point">
            <option value="Москва">Москва</option>
            <!-- Добавьте другие пункты -->
        </select>

        <label for="dropoff-ownership">Собственность:</label>
        <select id="dropoff-ownership">
            <option value="COC">COC</option>
            <!-- Добавьте другие типы собственности -->
        </select>

        <label for="dropoff-container">Контейнер:</label>
        <select id="dropoff-container">
            <option value="20DRY">20DRY</option>
            <!-- Добавьте другие контейнеры -->
        </select>
    </form>

    <table id="dropoff-results">
        <thead>
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
