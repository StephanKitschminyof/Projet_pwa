<?php session_start();
include("../../Model/script_bdd.php");

function liste_bloc(){
    $liste_bloc = chercherBlocs()->fetchAll();
    echo '<ul>';

    for($i=0;$i<count($liste_bloc);$i++){
        echo '<li>';

        echo ' <form method="post" action="../../Controler/modifierBloc.php?idbloc='.$liste_bloc[$i]['idbloc'].'">
        <label>'.$liste_bloc[$i]['nombloc'].'</label>
        <input type="submit" name="supprimer" value="Supprimer" />
        <input type="submit" name="modifier" value="Modifier" />
        </form>';
        echo '</li>';
    }

   


    echo '</ul>';

    echo '<form method="post" action="../../Controler/ajouterBloc.php" enctype="multipart/form-data">
    <label for="ajouter">Ajout d\'un bloc (fichier.json)</label>
    <input type=file id="ajouter" name="ajouter" />
    <input type="submit" name="envoyer" value="Ajouter le bloc"> 
    </form>';
    
}

?>