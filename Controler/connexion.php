<?php
session_start();
include '../Model/script_bdd.php';

$erreur = false;

//Test si l'identifiant a bien était rentré
if(isset($_POST['identifiant']) and !empty($_POST['identifiant'])){
    $identifiant = $_POST['identifiant'];
}
else{
    $erreur = true;
}

//Test si le mdp a bien était rentré
if(isset($_POST['mdp']) and !empty($_POST['mdp'])){
    $mdp = $_POST['mdp'];
}
else{
    $erreur = true;
}



//Si les champs sont bien récupérer test dans la bdd
if($erreur == false){
    $reponse = chercherCompte($identifiant, $mdp);
    if($reponse){
        $result = $reponse->fetch();
        $idCompte = $result['idcompte'];

        //Recherche de l'étudiant
        if(!$result['estenseignant']){
            
            $reponse = chercherEtudiantParIdcompte($idCompte);
            if($reponse){ //Si un étudiant est trouvé alors on le connecte
                $result = $reponse->fetch();
                $_SESSION['idEtudiant'] = $result['idetudiant'];
                $_SESSION['nom'] = $result['nom'];
                $_SESSION['prenom'] = $result['prenom'];
                $_SESSION["couleurProfil"] = $result['couleurProfil'];
                header('Location: ../View/php/menu.php');
            }
            else{
                //Erreur on laisse sur la page de connexion
                echo "probleme pour trouver étudiant";
            }
        }
        //Recherche enseignant
        else{
            $reponse = chercherEnseignantParIdcompte($idCompte);
            if($reponse){
                $result = $reponse->fetch();
                $_SESSION['idEnseignant'] = $result['idenseignant'];
                $_SESSION['nom'] = $result['nom'];
                $_SESSION['prenom'] = $result['prenom'];
            }
            else{
                //Erreur on laisse sur la page de connexion
                echo "probleme trouver enseignant";
            }
        }
    }
    else{
        echo "pas trouvé l'etudiant";
    }
}