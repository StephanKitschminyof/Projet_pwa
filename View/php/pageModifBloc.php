<?php 
session_start();
//Redirection vers la page de connexion si pas de compte connecté
include ("../../Controler/testConnectionEnseignant.php");

include("../../Controler/modifBloc.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blocs enseignant</title>
        
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/styleModif.css">

        <link rel = "manifest" href = "../manifest.json">
    </head>

    <body>
        <div class="d">
            <?php page() ?>
        </div>
        <?php
            include("./bottom_menu_enseignant.php");
        ?>
    </body>
</html>