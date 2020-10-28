<?php
session_start();
include_once("../../Model/script_bdd.php");

function recupinfo(){
    $idetu = $_SESSION['idEtudiant'];//id de l'étu
    $nombloc = $_GET['nomBloc'];//nom du bloc recuperé de la page précédante

    $infoBloc = chercherBloc($nombloc)->fetch(); //recuperation de toutes le infos du bloc
    $listeCompetences = chercherCompetencesBloc($infoBloc['idbloc'])->fetchAll();//liste des competance
    $listeCompetenceEtu = chercherCompetencesBlocEtu($infoBloc['idbloc'],$idetu)->fetchAll();//listes des compétances de l'etudiant dans le bloc courant
    
    $pourcentageBloc = 0;
    if(count($listeCompetenceEtu) != 0 && count($listeCompetences) != 0){
        $pourcentageBloc = count($listeCompetenceEtu)/count($listeCompetences)*100;//création du pourcentage de competances finis dans le bloc
    }
    
    return $tab_info =  array(
        "idetu" => $idetu,
        "nombloc" => $nombloc,
        "infoBloc" => $infoBloc,
        "listeCompetences" => $listeCompetences,
        "listeCompetencesEtu" => $listeCompetenceEtu,
        "pourcentageBloc" => $pourcentageBloc
        );
}


?>