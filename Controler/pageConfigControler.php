<?php
session_start();
include ("../../Model/script_bdd.php");
function recupinfo(){
    $idetu = $_SESSION['idEtudiant'];//id de l'étu
    $etu = chercherEtudiantParId($idetu)->fetch();
    $promo = (chercherPromoParId($etu['idpromo'])->fetch())['nom'];
   
    return $tab_info =  array(
        "idetu" => $idetu,
        "infoEtu" => $etu,
        "promo" => $promo
        );
}


?>