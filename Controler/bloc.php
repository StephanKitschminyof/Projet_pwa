<?php

include '../../Model/script_bdd.php';

blocsPourUnEtudiant(1);

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