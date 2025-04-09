<?php
$langCode = 'cs';
$basePath = '';
$title = 'Ponnath - family passion for better food';
$linksSite = 'public/';
?>
<!doctype html>
<html lang="<?= $langCode; ?>">
    <head>
        <base href="<?= $basePath; ?>">
        <title><?= $title; ?></title>
        <?php include "head/meta.php"; ?>
        <?php include "head/links_Preload.php"; ?>
        <?php include "head/scripts.php"; ?>
    </head>
    <body class="layout">
        <?php include "body/container.php"; ?>
        <?php include "body/scripts.php"; ?>
    </body>
</html>