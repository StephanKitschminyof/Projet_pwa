<?php
session_start();
include_once("../Model/script_bdd.php");

if(isset($_POST['idbloc']) and !empty($_POST['idbloc'])){
    //Si est déja dans le menu alors on l'enlève
    if(estDansMenu($_POST['idbloc'], $_SESSION['idEtudiant'])){
        retirerBlocEtudiant($_POST['idbloc'], $_SESSION['idEtudiant']);
    }
    //Sinon on le met dans le menu
    else{
        ajouterBlocEtudiant($_POST['idbloc'], $_SESSION['idEtudiant']);
    }
}

header('Location: ../View/php/menu.php');


function estDansMenu($idbloc, $idEtudiant){
    $reponse = chercherBlocEtudiant($idEtudiant);
    while($donnees = $reponse->fetch()){
        if($donnees["idbloc"] == $idbloc){
            return true;
        }
    }
    return false;
}