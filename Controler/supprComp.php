<?php
include("../Model/script_bdd.php");



$idbloc = $_GET['idbloc'];
$idcomp = $_GET['idcomp'];
if(isset($_POST['valider']) and !empty($_POST['valider'])){
    $titrec = $_POST['titre'];
    $descr = $_POST['ta'];
    updateComp($idcomp,$titrec,$descr);
}else if(isset($_POST['ajouter']) and !empty($_POST['ajouter'])){
    $nomcomp = $_POST["ntitre"];
    $description = $_POST["nta"];
    $exp = $_POST["exp"];
    ajouterCompetance($nomcomp,$description,$exp,$idbloc);
}else{
    supprimerCompetance($idcomp,$idbloc);
}

header("Location: ../View/php/pageModifBloc.php?idbloc=".$idbloc);

?>