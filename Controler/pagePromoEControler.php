<?php 
if(empty($_SESSION))
{
    session_start();
}

include_once("../../Model/script_bdd.php");

/**
 * Permet d'afficher en html la liste des promos
 */
function liste_promo(){
    $liste_promo = chercherPromo()->fetchAll();
    echo "<div class='ul'><div class='dtitre'><p>Liste des promotions</p></div>";
    for($i=0;$i<count($liste_promo);$i++)
    {
        echo "<div class='li'>";
        echo "<a class=\"afficher\" href='./pageElevePromo.php?idpromo=".$liste_promo[$i]['idpromo']."&nompromo=".$liste_promo[$i]['nom']."'>".$liste_promo[$i]['nom']."</a>";
        echo "</div>";

    }
    
    echo "</div>";
}