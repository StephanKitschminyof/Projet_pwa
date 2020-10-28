<?php
if((include_once '../../Model/script_bdd.php') === FALSE){
    include '../../Model/script_bdd.php';
}


function blocsPourUnEtudiant($idEtudiant)
{
    $tabBlocs = array();
    //Récupère la liste des blocs d'un étudiant
    $reponse = chercherBlocEtudiant($idEtudiant);
    while($donnees = $reponse->fetch())
    {
        $tabBlocs[] = $donnees['nombloc'];
    }
    return $tabBlocs;
}