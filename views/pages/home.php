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
    <?php
        $view->component('sea/filter', ['filter' => $data['filters']['sea']]);
        $view->component('sea/list', ['list' => []]);
    ?>


    <h2>ЖД перевозка</h2>
    <?php
        $view->component('rail/filter', ['filter' => $data['filters']['railway']]);
        $view->component('rail/list', ['list' => []]);
    ?>

    <h2>Drop Off</h2>
    <?php
        $view->component('container/filter', ['filter' => $data['filters']['container']]);
        $view->component('container/list', ['list' => []]);
    ?>
</div>

<?php $view->component('footer'); ?>