<?php include("../../Controler/pageEleveBlocControler.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blocs enseignant</title>
        <link rel="stylesheet" type="text/css" href="../css/styleBlocE.css">
        <link rel="stylesheet" type="text/css" href="../css/styleBottomMenu.css">
    </head>

    <body>

        <div>
            <?php liste_bloc(); ?>
        </div>

        <?php
            include("./bottom_menu.php");
        ?>
    </body>
</html>