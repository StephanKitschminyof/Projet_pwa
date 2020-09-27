<?php
include ("../../Model/script_bdd.php");

function nomPromo()
{
    $reponse = chercherPromoEtudiant($_SESSION['idEtudiant']);
    if($reponse)
    {
        $result = $reponse->fetch();
        return $result['nom'];
    }
    else{
        return "Promo non définit";
    }
}


function niv()
{
    $reponse = chercherEtudiantParNomEtPrenom($_SESSION["nom"], $_SESSION["prenom"]);
    if($reponse)
    {
        $result = $reponse->fetch();
        return intval(0.2 * sqrt($result["exp"])); //TODO modifier cette formule pour calculer les niv
    }
    else{
        return "0";
    }
}

function xp()
{
    $reponse = chercherEtudiantParNomEtPrenom($_SESSION["nom"], $_SESSION["prenom"]);
    if($reponse)
    {
        $result = $reponse->fetch();
        return $result["exp"];
    }
    else{
        return "0";
    }
}

function titre($idEtudiant){
    //Récupérer le titre de l'étudiant a afficher
    $reponse = chercherTitreActif($idEtudiant);
    if($reponse)
    {
        $result = $reponse->fetch();
        return $result["nomtitre"];
    }
    else{
        return "noob tu n'as pas de titre";
    }
}

function listeTitres($idEtudiant)
{
    return chercherTitres($idEtudiant);
}

function listeTitresLock($idEtudiant)
{
    
}