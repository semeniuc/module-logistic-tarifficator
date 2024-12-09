<?php

use Bitrix\Main\UI\Extension;
use Tarifficator\Kernel\View\View;

/**
 * @var View $view
 * @var $data = []
 * */

$view->component('header', $data);

Extension::load("ui.forms");

?>

    <div class="container">
        <div class="content">
            <h2>Итог</h2>
            <div class="content-block">
                <?php
                $view->component('result/form');
                ?>
            </div>

            <h2>Морская перевозка</h2>
            <div class="content-block">
                <?php
                $view->component('sea/filter', ['filter' => $data['filters']['sea']]);
                $view->component('sea/list');
                ?>
            </div>

            <h2>ЖД перевозка</h2>
            <div class="content-block">
                <?php
                $view->component('rail/filter', ['filter' => $data['filters']['railway']]);
                $view->component('rail/list');
                ?>
            </div>

            <h2>Автоперевозка</h2>
            <div class="content-block">
                <?php
                $view->component('auto/filter', ['filter' => $data['filters']['auto']]);
                $view->component('auto/list');
                ?>
            </div>

            <h2 class="container-dynamic-name">Drop Off</h2>
            <div class="content-block">
                <?php
                $view->component('container/filter', ['filter' => $data['filters']['container']]);
                $view->component('container/list');
                ?>
            </div>
        </div>
    </div>

<?php
$view->component('footer'); ?>