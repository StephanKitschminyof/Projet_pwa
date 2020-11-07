<?php
session_start();

if((include_once '../../Model/script_bdd.php') === FALSE){
    include("../../Model/script_bdd.php");
}

function recupinfo(){
    $idetu = $_SESSION['idEtudiant'];//id de l'étu
    $nombloc = $_GET['nombloc'];//nom du bloc recuperé de la page précédante
    $idcomp = $_GET['idcomp'];

    $infoBloc = chercherBloc($nombloc)->fetch(); //recuperation de toutes le infos du bloc
    $infocomp = chercherCompetence($idcomp)->fetch();
    $listeCompetenceEtu = chercherCompetencesBlocEtu($infoBloc['idbloc'],$idetu)->fetchAll();//listes des compétances de l'etudiant dans le bloc courant

    $dejaConnue = in_array($infocomp,$listeCompetenceEtu);
   

    return $tab_info =  array(
        "idetu" => $idetu,
        "nombloc" => $nombloc,
        "idcomp" => $idcomp,
        "infoBloc" => $infoBloc,
        "listeCompetencesEtu" => $listeCompetenceEtu,
        "infocomp" => $infocomp,
        "dejaConnue" => $dejaConnue
        );
}


?>
