<?php

include("../Model/script_bdd.php");

$idbloc = $_GET['idbloc'];
$bloc = chercherBlocId($idbloc)->fetch();
$liste_comp = chercherCompetencesBloc($idbloc)->fetchAll();
    

if(isset($_POST['supprimer']) and !empty($_POST['supprimer'])){
    supprimerBloc($idbloc);
    header("Location: ../View/php/pageBlocE.php");
}else if(isset($_POST['modifier']) and !empty($_POST['modifier'])){
    header("Location: ../View/php/pageModifBloc.php?idbloc=".$idbloc);
}
else{
    //gestion erreur
}


 ?>