<?php include("../../Controler/modifierBlocControler.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blocs enseignant</title>
        
        <link rel="stylesheet" type="text/css" href="../css/styleBottomMenu.css">
        <link rel = "manifest" href = "../manifest.json">
    </head>

    <body>
       
        <div>
            <?php liste_bloc() ?>
        </div>

        <?php
            include("./bottom_menu.php");
        ?>
    </body>
</html>