<?php 
session_start();
include_once("../Model/script_bdd.php");

//Si on récupère bien les informations
if(isset($_POST['nomtitre']) and !empty($_POST['nomtitre'])){

    //Trouver l'id du titre
    $reponse = chercherIdTitre($_POST["nomtitre"]);

    if($idtitre = $reponse->fetch()){
        //Changer la variable globale
        $_SESSION["idTitre"] = $idtitre["idtitre"];

        //Changer le titre de l'étudiant par le nouveau
        updateTitre($_SESSION["idEtudiant"], $_SESSION["idTitre"]);
    }
    
}

header("Location: ../View/php/profil.php");

