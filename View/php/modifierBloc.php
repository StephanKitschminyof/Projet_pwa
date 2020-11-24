<?php 
session_start();
//Redirection vers la page de connexion si pas de compte connecté
include ("../../Controler/testConnectionEnseignant.php");

include("../../Controler/modifierBlocControler.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blocs enseignant</title>
        
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/styleModifBloc.css">

        <link rel = "manifest" href = "../manifest.json">
    </head>

    <body>
        <div class="ul">
        <input type="button" onClick="document.location.href='./pageBlocE.php'" value="Retour" name="retour" class="retour" />
            <?php liste_bloc() ?>
        </div>
        

        <?php
            include("./bottom_menu_enseignant.php");
        ?>
    </body>
</html>