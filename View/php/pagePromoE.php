<?php include("../../Controler/pagePromoEControler.php"); ?>
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
            <?php liste_promo(); ?>
        </div>

        <?php
            include("./bottom_menu.php");
        ?>
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../js/filtreTest.js"></script>
    </body>
</html>