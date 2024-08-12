<?php

/**
 * @var \App\DTO\List\SeaListDTO[] $list
 */

?>

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
    <?php foreach ($list as $item):?>
    <tr>
        <td><?= htmlspecialchars($item->contractor); ?></td>
        <td><?= htmlspecialchars($item->route); ?></td>
        <td><?= htmlspecialchars($item->destination); ?></td>
        <td><?= htmlspecialchars(mb_convert_case($item->containerOwner, MB_CASE_UPPER)); ?></td>
        <td><?= htmlspecialchars(mb_convert_case($item->containerType, MB_CASE_UPPER)); ?></td>

        <td><?= htmlspecialchars($item->deliveryCost); ?></td>
        <td><?= htmlspecialchars($item->deliveryPriceValidFrom); ?></td>
        <td class="note"><?= htmlspecialchars($item->comment) ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
