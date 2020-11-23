<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Page de connexion</title>
        <link rel="stylesheet" type="text/css" href="../View/css/styleCreationCompte.css">
        <link rel = "manifest" href = "../../manifest.json">

    
    </head>
    <body>
        
    

<?php
include("../Model/script_bdd.php");


//var_dump($_POST);
if(isset($_POST["nom"])){
    $log = $_GET['log'];
    $pass = $_GET['pass'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    if($_GET['fct'] == "etudiant"){
        $fct = 0;
        $filiaire = intval($_POST['filiere']);
        ajouterCompte($log,$pass,$fct);
        $cpt = chercherIdCompte();
        ajouterEtudiant($nom,$prenom,0,$filiaire,$cpt,"#FFFFFF");
    }else{
        $fct = 1;
        ajouterCompte($log,$pass,$fct);
        $cpt = chercherIdCompte();
        ajouterEnseignant($nom,$prenom,$cpt);
    }
    mkdir("oh");
    copy("../View/img/profil/default.png",$prenom."-".$nom.".png");
    header("Location: ../index.php?nvx=1");
    
    

}else{
    echo '<h1>Informations supplementaires :</h1>';
    echo'<form action="?log='.$_POST["identifiant"].'&pass='.$_POST["mdp"].'&fct='.$_POST["fonction"].'" method="post">
    <div class="champ2">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" required />
    </div>

    <div class="champ2">
    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" id="prenom" required />
    </div class="champ">';

    if($_POST['fonction'] == "etudiant"){

    echo'
    <div class="champ2">
    <label for="filiere">Filiere</label>';
    //affichage de toutes les promos disponibles
        $liste_promo = chercherPromo()->fetchAll();
        echo '<select name="filiere" id="filiere">';

        for($i=0;$i<count($liste_promo);$i++)
        {
            echo '<option value="'.$liste_promo[$i]["idpromo"].'">'.$liste_promo[$i]["nom"].'</option>';
        }

        echo '</select></div>';
    }
    echo'<div class="champ2">
            <input type="submit" value="Valider">
        </div>';
     echo '</form></div>';
    }

?>


    </body>

</html>