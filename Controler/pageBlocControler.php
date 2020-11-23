<?php
if(empty($_SESSION))
{
    session_start();
}
include_once("../../Model/script_bdd.php");

function recupinfo(){
    $idetu = $_SESSION['idEtudiant'];//id de l'étu
    $nombloc = $_GET['nomBloc'];//nom du bloc recuperé de la page précédante

    $infoBloc = chercherBloc($nombloc)->fetch(); //recuperation de toutes le infos du bloc
    $listeCompetences = chercherCompetencesBloc($infoBloc['idbloc'])->fetchAll();//liste des competance
    $listeCompetenceEtu = chercherCompetencesBlocEtu($infoBloc['idbloc'],$idetu)->fetchAll();//listes des compétances de l'etudiant dans le bloc courant
    
    $paliers = count($listeCompetences)/4;

    $pourcentageBloc = 0;
    $CompetenceEtuVal = (chercherCompetencesValideBlocEtu($infoBloc['idbloc'],$idetu)->fetch())["COUNT(ce.idetu)"];
    if(count($listeCompetences) != 0){
        $pourcentageBloc = round($CompetenceEtuVal/count($listeCompetences)*100);//création du pourcentage de competances finis dans le bloc
    }

    $nbpaliers = ceil($pourcentageBloc / (100/$paliers)+0.2);
    if($nbpaliers > $paliers){
        $nbpaliers = $paliers;
    } 
    var_dump($pourcentageBloc / (100/$paliers));
    return $tab_info =  array(
        "idetu" => $idetu,
        "nombloc" => $nombloc,
        "infoBloc" => $infoBloc,
        "listeCompetences" => $listeCompetences,
        "listeCompetencesEtu" => $listeCompetenceEtu,
        "pourcentageBloc" => $pourcentageBloc,
        "nbpaliers" => $nbpaliers
        );
}


?>