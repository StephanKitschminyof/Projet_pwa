<?php 
if(empty($_SESSION))
{
    session_start();
}

include_once("../../Model/script_bdd.php");

function liste_eleve(){
    $idPromo = $_GET['idpromo'];
    $promo = $_GET['nompromo'];

    $liste_eleve = chercherPromoEleve($idPromo)->fetchAll();
    echo "<div class='ul'><div class='dtitre'><p>Liste des élèves <br> Filière : ".$promo."</p></div>";
    for($i=0;$i<count($liste_eleve);$i++)
    {
        echo "<div class='li'>";
        echo "<a href='./pageEleveBloc.php?idetu=".$liste_eleve[$i]['idetudiant']."&idpromo=".$idPromo."&nompromo=".$promo."'>".$liste_eleve[$i]['nom']." ".$liste_eleve[$i]['prenom']."</a>";
        echo "</div>";

    }




    echo "</div>";

}
?>