<?php
session_start();

include_once("../../Model/script_bdd.php");

$idetu = $_GET['idetu'];//id de l'étu
$idcomp = $_GET['idcomp'];//id de la competence

$infocomp = chercherCompetence($idcomp)->fetch();
$infoetu = chercherEtudiantParId($idetu)->fetch();


function recupinfo(){
    global $infocomp;
    global $infoetu;

    $valide = $_GET['valide'];


    return $tab_info =  array(
        "nom" => $infoetu['nom'],
        "prenom" => $infoetu['prenom'],
        "titre" => $infocomp['nomcomp'],
        "description" => $infocomp['description'],
        "valide" => $valide
        );
}

function valideCompEtu(){
    global $idcomp;
    global $infocomp;
    global $infoetu;
    global $idetu;

    //recup la date 
    $date = date("d/m/Y");;

    //inserer la date dans competenceetu
    updateDateValide($date,$idcomp,$idetu);

    //inserer l'xp dans l'étudiant
    updateXpEtu($idetu,$infocomp['expraporte']+$infoetu['exp']);

    header("Location: ./pageEtuE.php?idetu=". $idetu ."&idcomp=". $idcomp."&valide=0");


}


?>