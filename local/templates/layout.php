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
    <body>
        <?php include "body/titulni.php"; ?>
        <?php //include "body/o-nas.php"; ?>
        <?php //include "body/kariera.php"; ?>
        <?php //include "body/nase-produkty.php"; ?>
        <?php //include "body/kontakty.php"; ?>
        <?php //include "body/paticka/kontakt.php"; ?>
        <?php //include "body/paticka/gdpr.php"; ?>
        <?php //include "body/paticka/vzor.php"; ?>
        <?php include "body/paticka.php"; ?>
        <?php include "body/scripts.php"; ?>
    </body>
</html>