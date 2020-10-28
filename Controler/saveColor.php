<?php 
session_start();
include_once("../Model/script_bdd.php");

//Sauvegarder la nouvelle couleur 
if(isset($_POST['color']) and !empty($_POST['color'])){
    updateCouleurProfil($_SESSION["idEtudiant"], $_POST["color"]);
    $_SESSION["couleurProfil"] = $_POST["color"]; 
}

//Sauvegarder le nouveau title TODO


header("Location: ../View/php/selectColor.php");
