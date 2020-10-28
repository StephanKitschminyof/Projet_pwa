<?php session_start();

include_once("../../Model/script_bdd.php");

function liste_eleve(){
    $idPromo = $_GET['idpromo'];

    $liste_eleve = chercherPromoEleve($idPromo)->fetchAll();
    echo "<ul class='ul'>";
    for($i=0;$i<count($liste_eleve);$i++)
    {
        echo "<li class='li'>";
        echo "<a href='./pageEleveBloc.php?idetu=".$liste_eleve[$i]['idetudiant']."'>".$liste_eleve[$i]['nom']." ".$liste_eleve[$i]['prenom']."</a>";
        echo "</li>";

    }




    echo "</ul>";

}
?>