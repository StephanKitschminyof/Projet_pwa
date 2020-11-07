<?php

session_start();
include_once("../../Model/script_bdd.php");

//var_dump($_POST);

if(isset($_POST['promos']) and !empty($_POST['promos'])){
    header("Location: ../View/php/pagePromoE.php");//redirection vers la liste des promos dans php

}elseif(isset($_POST['blocs']) and !empty($_POST['blocs'])){
    header("Location: ../View/php/pageBlocE.php");//redirection vers la liste des blocs

}elseif(isset($_POST['stats']) and !empty($_POST['stats'])){
    header("Location: ../View/php/");//redirection vers les statistiques

}elseif(isset($_POST['deconnexion']) and !empty($_POST['deconnexion'])){
    unset($_SESSION["idEnseignant"]);
    unset($_SESSION["nom"]);
    unset($_SESSION["prenom"]);
    header("Location: ../index.php");//redirection vers la page de connexion

}else{
    //gestion des erreur 
    echo "erreur";
}



?>