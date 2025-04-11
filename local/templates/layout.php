<?php
$langCode = 'cs';
$basePath = '';
$title = 'Ponnath - family passion for better food';
$linksSite = 'public/';
$logoImages = 'public/img/logo/';
$layoutImages = 'public/img/';
$layoutVideo = 'public/video/';
?>
<!doctype html>
<html lang="<?= $langCode; ?>">
    <head>
        <base href="<?= $basePath ?>">
        <title><?= $title ?></title>
        <?php include "head/meta.php"; ?>
        <?php include "head/links.php"; ?>
        <?php include "head/scripts.php"; ?>
    </head>
    <body class="layout">
        <?php //  include "body/container.php"; ?>
        <?php // include "body/o-nas.php"; ?>
        <?php // include "body/kariera.php"; ?>
        <?php include "body/nase-produkty.php"; ?>
        <?php // include "body/kontakt.php"; ?>
        <?php include "body/scripts.php"; ?>
    </body>
</html>