<?php 
session_start();
//Redirection vers la page de connexion si pas de compte connecté
include ("../../Controler/testConnectionEnseignant.php");

include("../../Controler/pageBlocEController.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blocs enseignant</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/styleBlocE.css">
        <link rel = "manifest" href = "../manifest.json">
        <script src="../js/jquery-3.5.1.min.js"></script>

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

        <div class="d">
            <?php liste_bloc(); ?>
            <script src="../js/listeDeroulante.js"></script>
        </div>

        <?php
            include("./bottom_menu.php");
        ?>
        <script src="../js/filtreTest2.js"></script>
    </body>
</html>