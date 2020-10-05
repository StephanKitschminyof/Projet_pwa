<?php
include("../Model/script_bdd.php");

$idbloc = $_GET['idbloc'];


if(isset($_POST['supprimer']) and !empty($_POST['supprimer'])){
    supprimerBloc($idbloc);
    header("Location: ../View/php/pageBlocE.php");
}else if(isset($_POST['modifier']) and !empty($_POST['modifier'])){
  
}
else{
    //gestion erreur
}
 ?>