<?php

include("../Model/script_bdd.php");

//Initialisation variables
$idbloc = $_GET['idbloc'];
$bloc = chercherBlocId($idbloc)->fetch();
$liste_comp = chercherCompetencesBloc($idbloc)->fetchAll();
    
//on supprime ou modifie le bloc suivant la demande de l'utilisateur
if(isset($_POST['supprimer']) and !empty($_POST['supprimer'])){
    supprimerBloc($idbloc);
    header("Location: ../View/php/modifierBloc.php");
}else if(isset($_POST['modifier']) and !empty($_POST['modifier'])){
    header("Location: ../View/php/pageModifBloc.php?idbloc=".$idbloc);
}
else{
    //gestion erreur
}


 ?>