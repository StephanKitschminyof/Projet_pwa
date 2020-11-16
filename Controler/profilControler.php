<?php
if(empty($_SESSION))
{
    session_start();
}
include_once("../../Model/script_bdd.php");

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

//Récupérer le titre de l'étudiant a afficher
function titre(){
    $reponse = chercherTitre($_SESSION["idTitre"]);
    if($result= $reponse->fetch())
    {
        return $result["nomtitre"];
    }
    else{
        return "Nooby";
    }
}

 //Récupère la liste des blocs d'un étudiant
function blocsDunEtudiant($idEtudiant)
{
    $tabBlocs = array();
    $reponse = chercherBlocEtudiant($idEtudiant);
    while($donnees = $reponse->fetch())
    {
        $tabBlocs[] = $donnees['idbloc'];
    }
    return $tabBlocs;
}

//Afficher tous les titres que l'étudiant peut utiliser
function listeTitres($idEtudiant)
{    
    $listeTitres = array();


    //Selection des blocs de l'étudiants
    $tabIdBloc = blocsDunEtudiant($idEtudiant);

    //Sélectionne les % des blocs
    for($i = 0; $i<sizeof($tabIdBloc); $i++){
        $listeCompetences = chercherCompetencesBloc($tabIdBloc[$i])->fetchAll();//liste des competance
        $listeCompetenceEtu = chercherCompetencesBlocEtu($tabIdBloc[$i],$idEtudiant)->fetchAll();//listes des compétances de l'etudiant dans le bloc courant
    
        $pourcentageBloc = 0;
        if(count($listeCompetenceEtu) != 0 && count($listeCompetences) != 0){
            $pourcentageBloc = count($listeCompetenceEtu)/count($listeCompetences)*100;//création du pourcentage de competances finis dans le bloc
        }
        //Pour chaque bloc selectionne les titres utilisables
        $reponse = chercherTitreUnlock($tabIdBloc[$i], $pourcentageBloc);
        while ($donnees = $reponse->fetch()){
            array_push($listeTitres, $donnees["nomtitre"]);
        }
    }
    return $listeTitres;
}
