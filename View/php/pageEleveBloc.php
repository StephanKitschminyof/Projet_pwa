<?php include("../../Controler/pageEleveBlocControler.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blocs enseignant</title>
        <link rel="stylesheet" type="text/css" href="../css/styleBlocE.css">
        <link rel="stylesheet" type="text/css" href="../css/styleBottomMenu.css">
        <link rel = "manifest" href = "../manifest.json">
        <script src="../js/jquery-3.5.1.min.js"></script>
        
    </head>

    <body>

        <div class="d">
            <?php liste_bloc(); ?>
            <script src="../js/listeDeroulante.js"></script>
        </div>
        <?php
            include("./bottom_menu.php");
        ?>

        
    </body>
</html>