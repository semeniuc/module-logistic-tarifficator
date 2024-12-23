<?php

/** * @var $title */
$publicDirectory = dirname($_SERVER['SCRIPT_NAME']);
$appVersion = $_SERVER['APP_VERSION'];
global $APPLICATION;

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <?php
    $APPLICATION->ShowCSS(); ?>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="<?= $publicDirectory ?>/assets/<?= $appVersion ?>/css/main.css" rel="stylesheet">
</head>
<body>