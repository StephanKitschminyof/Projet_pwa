<?php session_start();
include("../../Model/script_bdd.php");

function liste_promo(){
    $liste_promo = chercherPromo()->fetchAll();
    echo "<ul class='ul'>";
    for($i=0;$i<count($liste_promo);$i++)
    {
        echo "<li class='li'>";
        echo "<a href='#'>".$liste_promo[$i]['nom']."</a>";
        echo "</li>";

    }




    echo "</ul>";
}