<?php
//Démarrage session si pas déja existante
if(empty($_SESSION))
{
    session_start();
}
include_once("../Model/script_bdd.php");

//Si on recoit bien les données du formulaire
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

/**
 * Donne si un bloc est déja ajouté dans le menu d'un étudiant.
 * 
 * @param int $idbloc 
 *      l'identitifiant d'un bloc
 * @param int $idEtudiant 
 *      l'identifiant d'un étudiant
 * @return boolean  
 */
function estDansMenu($idbloc, $idEtudiant){
    $reponse = chercherBlocEtudiant($idEtudiant);
    while($donnees = $reponse->fetch()){
        if($donnees["idbloc"] == $idbloc){
            return true;
        }
    }
    return false;
}