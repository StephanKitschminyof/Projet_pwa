<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Accueil enseignant</title>
        <link rel="stylesheet" type="text/css" href="../css/styleAccueilE.css">
        <link rel="stylesheet" type="text/css" href="../css/styleBottomMenu.css">
        <link rel = "manifest" href = "../manifest.json">
    </head>

    <body>
        <div>
            <form method="post" action="../../Controler/redirectionEnseignant.php">
                <div><input class="deco" type="submit" id="deco" name="deconnexion" value="&times;" /></div>
                <div class="label"><label for="deco">Déconnexion</label></div>
            </form>
        </div>

        <div>
            <form method="post" action="../../Controler/redirectionEnseignant.php">
                <div><input class="button" type="submit" name="promos" value="Promos" /></div>
                <div><input class="button" type="submit" name="blocs" value="Blocs" /></div>
                <div><input class="button" type="submit" name="stats" value="Statistique" /></div>
            </form>
        </div>

        <?php
            include("./bottom_menu.php");
        ?>
    </body>
</html>