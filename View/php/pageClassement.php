<?php 
session_start();
//Redirection vers la page de connexion si pas de compte connecté
include ("../../Controler/testConnectionEnseignant.php");

include("../../Controler/classementControler.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blocs enseignant</title>
        
        <link rel="stylesheet" type="text/css" href="../css/styleBottomMenu.css">
        <link rel="stylesheet" type="text/css" href="../css/styleClassement.css">

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
        <div class="d">
        <?php  affiche_bloc()?>
        </div>
        <?php
            include("./bottom_menu.php");
        ?>

        <script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../js/filtreClassement.js"></script>
    </body>
</html>