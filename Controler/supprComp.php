<?php
include("../Model/script_bdd.php");


//Initialisation
$idbloc = $_GET['idbloc'];
$idcomp = $_GET['idcomp'];

//Si valider :
if(isset($_POST['valider']) and !empty($_POST['valider'])){
    $titrec = $_POST['titre'];
    $descr = $_POST['ta'];
    updateComp($idcomp,$titrec,$descr);
}
//Si ajouter :
else if(isset($_POST['ajouter']) and !empty($_POST['ajouter'])){
    $nomcomp = $_POST["ntitre"];
    $description = $_POST["nta"];
    $exp = $_POST["exp"];
    ajouterCompetance($nomcomp,$description,$exp,$idbloc);
}
//Sinon Supprimer :
else{
    supprimerCompetance($idcomp,$idbloc);
}

header("Location: ../View/php/pageModifBloc.php?idbloc=".$idbloc);

?>