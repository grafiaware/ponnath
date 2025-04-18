<?php
$langCode;
$basePath;
$title;
$linksSite;
$logoImages;
$layoutImages;
$layoutVideo;
$layoutFiles;
$bodyTemplate;
?>
<!doctype html>
<html lang="<?= $langCode; ?>">
    <head>
        <base href="<?= $basePath ?>">
        <title><?= $title ?></title>
        <?php 
        include "head/meta.php";
        include "head/links.php";
        include "head/scripts.php";
        ?>
    </head>
    <body class="layout">
        <?php 
        include "body/flash/flashMessages.php";
        include "body/$bodyTemplate.php";
        include "body/paticka.php";
        //include "body/paticka/kontakt.php";
        //include "body/paticka/gdpr.php";
        //include "body/paticka/vzor.php"; 
        include "body/scripts.php";
        ?>
    </body>
</html>
