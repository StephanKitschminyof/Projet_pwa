<?php include("../../Controler/pageElevePromoControler.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blocs enseignant</title>
        <link rel="stylesheet" type="text/css" href="../css/styleCompE.css">
        <link rel="stylesheet" type="text/css" href="../css/styleBottomMenu.css">
        <link rel = "manifest" href = "../manifest.json">
    </head>

    <body>
        <div>
            <form method="post">
                <div>
                    <input class="recherche" type="search" id="rechercher" name="recherche" value="" />
                    <label for="rechercher"><img alt="icone loupe" src="" /></label>
                </div>
            </form>
        </div>

        <div>
            <?php liste_eleve(); ?>
        </div>

        <?php
            include("./bottom_menu.php");
        ?>
    </body>
</html>