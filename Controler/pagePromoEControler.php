<?php session_start();

include_once("../../Model/script_bdd.php");

function liste_promo(){
    $liste_promo = chercherPromo()->fetchAll();
    echo "<ul class='ul'>";
    for($i=0;$i<count($liste_promo);$i++)
    {
        echo "<li class='li'>";
        echo "<a href='./pageElevePromo.php?idpromo=".$liste_promo[$i]['idpromo']."'>".$liste_promo[$i]['nom']."</a>";
        echo "</li>";

    }




    echo "</ul>";
}