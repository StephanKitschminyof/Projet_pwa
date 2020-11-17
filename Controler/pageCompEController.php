<?php 
if(empty($_SESSION))
{
    session_start();
}
include_once("../../Model/script_bdd.php");

$idcomp = $_GET['comp'];

function liste_etu(){
    global $idcomp;
    $comp = chercherCompetence($idcomp)->fetch();
    echo "<div class='ul'><div class='dtitre'><p>Liste des élèves<br>Compétence : ".$comp['nomcomp']."</p></div>";
    $liste_notif = chercherEtudiantParCompetence($idcomp);
    $liste = chercherEtudiantComp($idcomp);

    while($d = $liste_notif->fetch()){
        echo "<div class='li' id='notif'>";
        echo "<a href='./pageEtuE.php?idetu=" . $d['idetudiant'] . "&idcomp=". $idcomp ."&valide=1'>". $d['nom'] . " " . $d['prenom'] ."</a>";
        echo "</div>";
    }

    while($d = $liste->fetch()){
        echo "<div class='li'>";
        echo "<a href='./pageEtuE.php?idetu=" . $d['idetudiant'] . "&idcomp=". $idcomp ."&valide=0'>". $d['nom'] . " " . $d['prenom'] ."</a>";
        echo "</div>";
    }
    
    echo "</div>";
}
?>