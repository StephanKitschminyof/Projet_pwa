<?php session_start();
if((include_once '../../Model/script_bdd.php') === FALSE){
    include '../../Model/script_bdd.php';
}
$idcomp = $_GET['comp'];

function liste_etu(){
    global $idcomp;

    echo "<ul class='ul'>";
    $liste_notif = chercherEtudiantParCompetence($idcomp);
    $liste = chercherEtudiantComp($idcomp);

    while($d = $liste_notif->fetch()){
        echo "<li class='li'>";
        echo "<a href='./pageEtuE.php?idetu=" . $d['idetudiant'] . "&idcomp=". $idcomp ."&valide=1'>". $d['nom'] . " " . $d['prenom'] ."</a><button class='notif'></button>";
        echo "</li>";
    }

    while($d = $liste->fetch()){
        echo "<li class='li'>";
        echo "<a class='n' href='./pageEtuE.php?idetu=" . $d['idetudiant'] . "&idcomp=". $idcomp ."&valide=0'>". $d['nom'] . " " . $d['prenom'] ."</a>";
        echo "</li>";
    }
    
    echo "</ul>";
}
?>