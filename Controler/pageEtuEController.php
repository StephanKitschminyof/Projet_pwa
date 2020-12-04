<?php
if(empty($_SESSION))
{
    session_start();
}

include_once("../../Model/script_bdd.php");

//Initialisation
$idetu = $_GET['idetu'];//id de l'étu
$idcomp = $_GET['idcomp'];//id de la competence

$infocomp = chercherCompetence($idcomp)->fetch();
$infoetu = chercherEtudiantParId($idetu)->fetch();

/**
 * Permet de récupérer les informations sur une compétence d'un étudiant
 * @return array
 *      les informations
 */
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

/**
 * Permet de valider une compétence d'un étudiant
 * @param string $page  
 *      la page pour la redirection après exécution de la fonction
 */
function valideCompEtu($page){
    global $idcomp;
    global $infocomp;
    global $infoetu;
    global $idetu;

    //recup la date 
    $date = date("d/m/Y");
 
    //inserer la date dans competenceetu
    updateDateValide($date,intval($idcomp),intval($idetu));

    //inserer l'xp dans l'étudiant
    updateXpEtu(intval($idetu),intval($infocomp['expraporte']+$infoetu['exp']));

    header("Location: ./pageEtuE.php?idetu=". $idetu ."&idcomp=". $idcomp."&valide=0&page=".$page);


}


?>