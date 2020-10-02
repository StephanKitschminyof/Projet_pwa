<?php 
session_start();
include '../Model/script_bdd.php';

if(isset($_POST['idtitre']) and !empty($_POST['nomtitre'])){

    //Trouver l'id du titre
    $idtitre = chercherIdTitre($_POST["nomtitre"]);

    //Changer la variable globale
    $_SESSION["idTitre"] =$idtitre;

    //Changer le titre de l'étudiant par le nouveau
    updateTitre($_SESSION["idEtudiant"], $_SESSION["idTitre"]);
}

header("Location: ../View/php/selectTitle.php");

