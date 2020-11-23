<?php 
session_start();
//Redirection vers la page de connexion si pas de compte connecté
include ("../../Controler/testConnectionEnseignant.php");

include("../../Controler/pageCompEController.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blocs enseignant</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/styleCompE.css">
        <link rel = "manifest" href = "../manifest.json">
    </head>

    <body>
        <div class="rechercher">
                    <input class="recherche" type="search" id="rechercher" name="recherche" value="" placeholder="Rechercher"/>
        </div>

        <div>
            <?php liste_etu(); ?>
        </div>
        <?php
            include("./bottom_menu_enseignant.php");
        ?>
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../js/filtreTest.js"></script>
    </body>
</html>