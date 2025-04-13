<?php
$langCode;
$basePath;
$title;
$linksSite;
$logoImages;
$layoutImages;
$layoutVideo;
$bodyTemplate;
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
        <?php include "body/$bodyTemplate.php"; ?>
        <?php include "body/scripts.php"; ?>
    </body>
</html>
