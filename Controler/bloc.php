<?php
include_once("../../Model/script_bdd.php");

/**
 * Donne la liste des blocs associés a un étudiant
 * 
 * @param int $idEtudiant
 *      l'identifiant de l'étudiant
 * @return array 
 *      la liste des blocs de l'étudiant
 */
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