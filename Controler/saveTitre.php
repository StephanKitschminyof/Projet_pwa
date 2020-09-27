<?php 
session_start();
include '../Model/script_bdd.php';

//Sauvegarder le nouveau titre
if(isset($_POST['idtitre']) and !empty($_POST['idtitre'])){
    //Désactiver l'ancien titre
    updateTitreDesactif($_SESSION["idEtudiant"]);

    //Rendre actif le nouveau titre
    updateTitreActif($_SESSION["idEtudiant"], $_POST["idtitre"]);
}




header("Location: ../View/php/selectTitle.php");

