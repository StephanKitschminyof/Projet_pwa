<?php 
session_start();
//Redirection vers la page de connexion si pas de compte connecté
include ("../../Controler/testConnectionEtudiant.php");

include("../../Controler/classementControler.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blocs enseignant</title>
        
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/styleClassement.css">

        <link rel = "manifest" href = "../manifest.json">
    
    </head>

    <body>
        <div class="rechercher">
                    <input class="recherche" type="search" id="rechercher" name="recherche" value="" placeholder="Rechercher"/>

        </div>
        <div class="d">
        <?php  affiche_bloc_etu()?>
        </div>
        <?php
            include("./bottom_menu.php");
        ?>

        <script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../js/filtreClassement.js"></script>
    </body>
</html>