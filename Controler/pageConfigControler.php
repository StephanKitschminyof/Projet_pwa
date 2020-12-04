<?php
if(empty($_SESSION))
{
    session_start();
}

if((include_once '../../Model/script_bdd.php') === FALSE){
    include("../../Model/script_bdd.php");
}

/**
 * Permet de récupérer les informations sur un étudiant
 * @return array
 *      tableau contenant les informations de l'étudiant
 */
function recupinfo(){
    $idetu = $_SESSION['idEtudiant'];//id de l'étu
    $etu = chercherEtudiantParId($idetu)->fetch();
    $promo = (chercherPromoEtudiant($etu['idpromo'])->fetch())['nom'];
   
    return $tab_info =  array(
        "idetu" => $idetu,
        "infoEtu" => $etu,
        "promo" => $promo
        );
}


?>